<?php

namespace App\Console\Commands;

use Exception;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateModelFunctions extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'app:CreateModelFunctions {model=all} '
		. '{--db : Erstellt alle Funktion für Felder aus der Datenbank} ';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Das Script erstellt die get und set Funktion für ein Model';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		if($this->argument('model') == 'all')
		{
			$files = $this->scan(app_path('Models'));
		}
		else
		{
			$files = [
				app_path('Models').DIRECTORY_SEPARATOR.$this->argument('model').'.php'
			];
		}
		foreach($files as $key => $file)
		{

			try
			{
				$modelname = '\\App'. str_replace([
					app_path(),
					'.php'
				], [
					'',
					''
				], $file);

				$model = new $modelname();
				$table = ($modelname)::getTableName();

				// Felder werden geschrieben
				$fields = ($modelname)::$fields;
				if(!empty($fields) && empty($model->getConnectionName()))
				{
					$file_content = file_get_contents($file);
					$last_char = strrpos($file_content, '}');
					$file_content = substr($file_content, 0, $last_char);
					file_put_contents($file, $file_content);
					foreach($fields as $field => $db_field)
					{
						$function_name = str_replace('_', '', ucwords($field, '_'));
						$this->info($function_name . ' wird geprüft.'.PHP_EOL);
						//Typen aus der Datenbank auslesen
						$db_column = DB::table('information_schema.COLUMNS')
							->where('TABLE_NAME', $table)
							->where('TABLE_SCHEMA', env('DB_DATABASE'))
							->where('COLUMN_NAME', $db_field)
							->first();
						if(!empty($db_column))
						{
							$typ = '';
							$nullable = '';
							if($db_column->IS_NULLABLE == 'YES')
							{
								$nullable = '?';
							}
							switch ($db_column->DATA_TYPE)
							{
								case 'int':
									$typ = $db_column->DATA_TYPE;
								break;
								case 'double':
								case 'decimal':
									$typ = 'float';
								break;
								case 'tinyint':
								case 'bigint':
									$typ = 'int';
								break;
								case 'varchar':
								case 'text':
									$typ = 'string';
								break;
								case 'date':
								case 'datetime':
								case 'time':
									$typ = '\DateTime';
								break;
							}
							if(strpos(strtolower($file_content), strtolower('set'.$function_name.'(')) == false)
							{
								$set_function_name = "\r\n\tpublic function set".$function_name."(";
								if(!empty($typ))
								{
									$set_function_name.= $nullable . $typ . " ";
								}
								$set_function_name.= "\$".$field.") : void\r\n";
								$set_function_name.= "\t{\r\n";
								if($typ == '\DateTime')
								{
									$set_function_name.= "\t\t$".$field." = \$".$field."->format('Y-m-d H:i:s');\r\n";
									$set_function_name.= "\t\t\$this->setAliasValue(\$".$field.", '".$field."');\r\n";
								}
								else
								{
									$set_function_name.= "\t\t\$this->setAliasValue(\$".$field.", '".$field."');\r\n";
								}
								$set_function_name.= "\t}\r\n";
								file_put_contents($file, $set_function_name, FILE_APPEND);
							}
							else
							{
								echo strtolower('set'.$function_name) . ' existiert schon'.PHP_EOL;
							}
							if(strpos(strtolower($file_content), strtolower('get'.$function_name.'(')) == false)
							{
								$file_content = file_get_contents($file);
								$get_function_name = "\r\n\tpublic function get".$function_name."()";
								if(!empty($typ))
								{
									$get_function_name.= " : " . $nullable . $typ;
								}
								$get_function_name.="\r\n";
								$get_function_name.="\t{\r\n";
								if($typ == '\DateTime')
								{
									$get_function_name.= "\t\treturn new \\DateTime(\$this->getAliasValue('".$field."'));\r\n";
								}
								else
								{
									$get_function_name.= "\t\treturn \$this->getAliasValue('".$field."');\r\n";
								}
								$get_function_name.= "\t}\r\n";
								file_put_contents($file, $get_function_name, FILE_APPEND);
								$file_content = file_get_contents($file);
							}
							else
							{
								echo strtolower('get'.$function_name) . ' existiert schon'.PHP_EOL;
							}
						}
					}
					file_put_contents($file, "\r\n}", FILE_APPEND);
				}

				//Felder die in der Datenbank stehen
				if($this->option('db') && empty($model->getConnectionName()))
				{
					$this->info('Felder auslesen');
					$file_content = file_get_contents($file);
					$last_char = strrpos($file_content, '}');
					$file_content = substr($file_content, 0, $last_char);
					file_put_contents($file, $file_content);

					$db_columns = DB::table('information_schema.COLUMNS')
						->where('TABLE_NAME', $table)
						->where('TABLE_SCHEMA', env('DB_DATABASE'))
						->get();

					foreach($db_columns as $db_column)
					{
						$this->setFunctionInFile($model, $db_column, $file);
					}

					file_put_contents($file, "\r\n}", FILE_APPEND);
				}
			}
			catch (Exception $e)
			{
				$this->error('In der Datei ist ein Fehler aufgetreten.' . $modelname);
				$this->error($e->getMessage());
			}
		}
	}

	protected function scan($pfad, array &$files = []) : array
	{
		$new_files = scandir($pfad);
		foreach($new_files as $file)
		{
			if(!in_array($file, ['.', '..']))
			{
				if(is_dir($pfad.DIRECTORY_SEPARATOR.$file))
				{
					$this->scan($pfad.DIRECTORY_SEPARATOR.$file, $files);
				}
				else
				{
					$files[] = $pfad.DIRECTORY_SEPARATOR.$file;
				}
			}
		}
		return $files;
	}

	private function setFunctionInFile($model, object $db_column, string $file, ?string $function_name = null, ?string $alias_field = null)
	{
		if($function_name == null)
		{
			$function_name = str_replace('_', '', ucwords($db_column->COLUMN_NAME, '_'));
		}
		if($alias_field == null)
		{
			$alias_field = $db_column->COLUMN_NAME;
		}
		echo $function_name . ' wird geprüft'.PHP_EOL;
		$typ = '';
		$nullable = '';
		if($db_column->IS_NULLABLE == 'YES')
		{
			$nullable = '?';
		}
		switch ($db_column->DATA_TYPE)
		{
			case 'int':
				$typ = $db_column->DATA_TYPE;
			break;
			case 'double':
			case 'decimal':
				$typ = 'float';
			break;
			case 'tinyint':
			case 'bigint':
				$typ = 'int';
			break;
			case 'varchar':
			case 'text':
				$typ = 'string';
			break;
			case 'date':
			case 'datetime':
			case 'time':
				$typ = '\DateTime';
			break;
		}
		$file_content = file_get_contents($file);
		if(strpos(strtolower($file_content), strtolower('set'.$function_name)) == false)
		{
			$set_function_name = "\r\n\tpublic function set".$function_name."(";
			if(!empty($typ))
			{
				$set_function_name.= $nullable . $typ . " ";
			}
			$set_function_name.= "\$".$alias_field.") : void\r\n";
			$set_function_name.= "\t{\r\n";
			if($typ == '\DateTime')
			{
				$set_function_name.= "\t\t$".$alias_field." = \$".$alias_field."->format('Y-m-d H:i:s');\r\n";
				$set_function_name.= "\t\t\$this->setAliasValue(\$".$alias_field.", '".$alias_field."');\r\n";
			}
			else
			{
				$set_function_name.= "\t\t\$this->setAliasValue(\$".$alias_field.", '".$alias_field."');\r\n";
			}
			$set_function_name.= "\t}\r\n";
			file_put_contents($file, $set_function_name, FILE_APPEND);
		}
		else
		{
			echo strtolower('set'.$function_name) . ' existiert schon'.PHP_EOL;
		}
		if(strpos(strtolower($file_content), strtolower('get'.$function_name)) == false)
		{
			$file_content = file_get_contents($file);
			$get_function_name = "\r\n\tpublic function get".$function_name."()";
			if(!empty($typ))
			{
				$get_function_name.= " : " . $nullable . $typ;
			}
			$get_function_name.="\r\n";
			$get_function_name.="\t{\r\n";
			if($typ == '\DateTime')
			{
				$get_function_name.= "\t\treturn new \\DateTime(\$this->getAliasValue('".$alias_field."'));\r\n";
			}
			else
			{
				$get_function_name.= "\t\treturn \$this->getAliasValue('".$alias_field."');\r\n";
			}
			$get_function_name.= "\t}\r\n";
			file_put_contents($file, $get_function_name, FILE_APPEND);
		}
		else
		{
			echo strtolower('get'.$function_name) . ' existiert schon'.PHP_EOL;
		}
	}
}

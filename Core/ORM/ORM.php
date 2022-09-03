<?php
require dirname(dirname(__DIR__)).'/vendor/autoload.php';

use Medoo\Medoo;

class ORM{

    protected $dbName;
    protected $tableName;
    protected $columnsArray;
    protected $resource;

    public function __construct( $data )
    {
        $this->tableName = $data['tableName'];
        $this->columnsArray = $data['columns'];
        $this->dbName = $data['dbName'];

        $this->resource = new medoo([
            'database_type' => env('DB_TYPE'),
            'database_name' => $this->dbName,
            'server' => env('DB_SERVER'), // En caso de ser remoto indicar servidor
            'username' => env('DB_USER'), // Tu nombre de usuario
            'password' => env('DB_PASSWORD'), // Tu password
            'port' => env('DB_PORT'),
            'charset' => env('DB_CHARSET')
        ]);
    }

    public function create($data){  return $this->json( $this->resource->insert($this->tableName, $data) ); }

    public function read($where){$columns = $this->columnsArray; return $this->json(($where['id'] != 'all') ? $this->resource->select($this->tableName, $columns) : $this->resource->select($this->tableName, $columns, $where) ); }

    public function update($data, $where){ return $this->json( $this->resource->update($this->tableName, $data, $where) ); }

    public function remove($where){ return $this->json( $this->resource->delete($this->tableName, $where) ); }

    public function json($data){ return json_encode($data);}
}

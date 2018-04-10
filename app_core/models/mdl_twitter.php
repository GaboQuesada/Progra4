<?php

require_once (__CON_PATH . "conexion.php");

class MDL_twitter {

    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    //Funcion para obtener registrosda
    public function get_tweets() {
        $this->conexion->consulta("SELECT tbl_posts.id ,  tbl_posts.post ,  tbl_posts.date "
                . "FROM  tbl_posts"
                . "ORDER BY  tbl_posts.id DESC ");

        $posts = array();
        $num_fila = 0;

        //obtenemos cada registro y cada campo
        while ($fila = $this->conexion->extraer_registro()) {

            $posts[$num_fila][0] = $fila[0];
            $posts[$num_fila][1] = $fila[2];
            $posts[$num_fila][1] = $fila[2];
            $num_fila++;
        }

        return $posts;
    }

    // funcion para insertar registros

    public function insertar_post($datospost = array()) {

        $this->conexion->consulta("INSERT INTO tbl_posts (post , date)  VALUES (' " . $datospost[0] . " ',' " . date('Y-m-d H:i:s') . " ')");
    }

}

?>
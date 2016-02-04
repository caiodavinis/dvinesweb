<?php
class MySQL {
        var $host = "localhost";
        var $user = "root";
        var $pass = "key!databaseadmin";
        var $db   = "dvinesweb";

        var $query;
        var $link;
        var $result;
        
        function MySQL(){
        }

        function connect(){
                $this->link = mysql_connect($this->host,$this->user,$this->pass);
				mysql_set_charset('utf8', $this->link);
                if(!$this->link){
                        echo "<div class='alertMessage error SE'>ERRO NA CONEXÃO.<br>"
                                ."<b>MySQL retornou: </b> ".mysql_error()."<br></div>";
                        die();
                } elseif (!mysql_select_db($this->db,$this->link)){
                        echo "<div class='alertMessage error SE'>ERRO AO SELECIONAR BANCO DE DADOS.<br></div>"
                                ."<b>MySQL retornou: </b> ".mysql_error()."<br>";
                        die();
                }
        }

        function sql($query){
                $this->connect();
                $this->query = $query;
                if($this->result=mysql_query($this->query)){
                        return $this->result;
                } else {
                        die("<div class='alertMessage error SE'><h2>OCORREU UM ERRO AO EXECUTAR A QUERY SQL ABAIXO:</h2><br>".$query."<<br><br><b>MySQL Retornou: ".mysql_error()."<b></div>");
                }
        }

        function disconnect(){
                return mysql_close($this->link);
        }
}
?>
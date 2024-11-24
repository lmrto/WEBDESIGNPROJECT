<!-- ClassPlaylistEArtista.php -->
<?php
    class ClassPlaylist{
        public $titulo;
        public $genero;
        public $id;

        function getTitulo() {
            return $this->titulo;
        }
        function getGenero(){
            return $this->genero;
        }
        function getId(){
            return $this->id;
        }
        function setTitulo($titulo) {
            $this->titulo = $titulo;
        }
        function setGenero($genero) {
            $this->genero = $genero;
        }
        function setId($id) {
            $this->id = $id;
        }
    }
    class ClassArtista{
        public $nome;
        public $musica;
        public $playlist_id;

        function getNome() {
            return $this->nome;
        }
        function getMusica() {
            return $this->musica;
        }
        function getPlaylistId() {
            return $this->playlist_id;
        }
        function setNome($nome) {
            $this->nome = $nome;
        }
        function setMusica($musica) {
            $this->musica = $musica;
        }
        function setPlaylistId($playlist_id) {
            $this->playlist_id = $playlist_id;
        }
    }

?>
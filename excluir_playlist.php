<?php
require_once 'ClassPlaylistDAO.php';

if (isset($_GET['id'])) {
    $id = $_GET['id']; 
    $playlistDAO = new ClassPlaylistDAO();
    
    if ($playlistDAO->excluirPlaylist($id)) {
        header('Location: listar.php'); 
        exit;
    } else {
        echo "Erro ao excluir playlist.";
    }
} else {
    echo "ID da playlist não fornecido.";
}
?>
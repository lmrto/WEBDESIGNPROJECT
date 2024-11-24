<!-- ClassPlaylistEARTISTADAO.php -->
<?php
require_once 'conexao.php';
class ClassPlaylistDAO {
    public function cadastrarPlaylist($novaPlaylist) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO playlist (genero, titulo) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $novaPlaylist->getGenero());
            $stmt->bindValue(2, $novaPlaylist->getTitulo());
            $stmt->execute();
            return $pdo->lastInsertId();  // Retorna o ID gerado da playlist
        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }   
    }
    public function cadastrarArtista($novoArtista) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO artista (nome, musica, playlist_id) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $novoArtista->getNome());
            $stmt->bindValue(2, $novoArtista->getMusica());
            $stmt->bindValue(3, $novoArtista->getPlaylistId());  // Associando a playlist ao artista
            $stmt->execute();
            return true;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }
    }

    public function listarPlaylist() {
        try {
            $pdo = Conexao::getInstance();
            $sql ="SELECT playlist.id, playlist.titulo, playlist.genero, artista.nome, artista.musica 
                    FROM playlist LEFT JOIN artista ON playlist.id = artista.playlist_id";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }
    }

    public function buscarPlaylistPorId($id) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM playlist WHERE id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $pdo->commit();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }
    }

    public function buscarTodasPlaylists() {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM playlist";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }
    }

    public function atualizarPlaylist($novaPlaylist, $novoArtista) {
        try {
            $pdo = Conexao::getInstance();
            $pdo->beginTransaction();
            $sql1 = "UPDATE playlist SET titulo=?,genero=? WHERE id=?";
            $sql2 = "UPDATE artista SET nome=?,musica=? WHERE playlist_id=?";
            $stmt1 = $pdo->prepare($sql1);
            $stmt2 = $pdo->prepare($sql2);
            $stmt1->bindValue(1, $novaPlaylist->getTitulo());
            $stmt1->bindValue(2, $novaPlaylist->getGenero());
            $stmt1->bindValue(3, $novaPlaylist->getId());
            $stmt2->bindValue(1, $novoArtista->getNome());
            $stmt2->bindValue(2, $novoArtista->getMusica());
            $stmt2->bindValue(3, $novoArtista->getPlaylistId());
            $stmt1->execute();
            $stmt2->execute();
            $pdo->commit();
            return true;
        } catch (PDOException $erro) {
            $pdo->rollBack();
            echo $erro->getMessage();
            return false;
        }
    }

    public function excluirPlaylist($id) {
        try {
            $pdo = Conexao::getInstance();
            $pdo->beginTransaction();
    
            // Primeiro exclui os artistas 
            $sql1 = "DELETE FROM artista WHERE playlist_id = ?";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->bindValue(1, $id);
            $stmt1->execute(); 
    
            // Agora exclui a playlist
            $sql2 = "DELETE FROM playlist WHERE id = ?";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->bindValue(1, $id);
            $stmt2->execute(); 
    
            $pdo->commit(); 
            return true; 
        } catch (PDOException $erro) {
            $pdo->rollBack(); 
            echo $erro->getMessage();
            return false; 
        }
    }
} // Fim da classe
?>

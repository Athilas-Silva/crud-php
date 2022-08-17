<?php 
        // Inserindo dados
        if(isset($_POST['save']) && isset($_POST['nome']) && isset($_POST['idade']) && isset($_POST['telefone']) && isset($_POST['email'])){

            $nome = limpaPost($_POST['nome']);
            $idade = limpaPost($_POST['idade']);
            $telefone = limpaPost($_POST['telefone']);
            $email = limpaPost($_POST['email']);
            
            // Validação de campo vazio
            if($nome == "" || $nome == null){
                echo "<strong class='error'>Nome não pode ser vazio</strong>";
                exit();
            }

            if($email == "" || $email == null){
                echo "<strong class='error'>Email não pode ser vazio</strong>";
                exit();
            }

            // Validação de nom e email
            // Verificar se o nome está correto
            if(!preg_match("/^[a-zA-Z-' ]*$/", $nome)){
                echo "<strong class='error'>Somente permitido letras e espaços em branco para o nome</strong>";
                exit();
            }

            //Verificar se é um email valido
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "<strong class='error'>Formato de email inválido</strong>";
                exit();
            }

            $sql = $pdo->prepare("INSERT INTO clientes VALUES (null, ?, ?, ?, ?)");
            $sql->execute(array($nome, $idade, $telefone, $email));

            echo "<strong class='error'>Cliente inserido com sucesso</strong>";
        }
    ?>

    <?php 
        // Atualização
        if(isset($_POST['atualizar']) && isset($_POST['id_editado']) && isset($_POST['nome_editado']) && isset($_POST['idade_editado']) && isset($_POST['telefone_editado']) && isset($_POST['email_editado'])){
            $id = limpaPost($_POST['id_editado']);
            $nome = limpaPost($_POST['nome_editado']);
            $idade = limpaPost($_POST['idade_editado']);
            $telefone = limpaPost($_POST['telefone_editado']);
            $email = limpaPost($_POST['email_editado']);

            // Validação de campo vazio
            if($nome == "" || $nome == null){
                echo "<strong class='error'>Nome não pode ser vazio</strong>";
                exit();
            }

            if($email == "" || $email == null){
                echo "<strong class='error'>Email não pode ser vazio</strong>";
                exit();
            }

            // Validação de nome e email
            // Verificar se o nome está correto
            if(!preg_match("/^[a-zA-Z-' ]*$/", $nome)){
                echo "<strong class='error'>Somente permitido letras e espaços em branco para o nome</strong>";
                exit();
            }

            //Verificar se é um email valido
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "<strong class='error'>Formato de email inválido</strong>";
                exit();
            }

            //Comando de atualização
            $update = $pdo->prepare("UPDATE clientes SET nome = ?, idade = ?, telefone = ?, email = ? WHERE id = ?");
            $update->execute(array($nome, $idade, $telefone, $email, $id));

            echo "Atualizado ".$update->rowCount()." registros!";
        }
    ?>

    <?php 
        //Deletar dados
        if(isset($_POST['deletar']) && isset($_POST['id_deletar']) && isset($_POST['nome_deletar']) && isset($_POST['idade_deletar']) && isset($_POST['telefone_deletar']) && isset($_POST['email_deletar'])){
            $id = limpaPost($_POST['id_deletar']);
            $nome = limpaPost($_POST['nome_deletar']);
            $idade = limpaPost($_POST['idade_deletar']);
            $telefone = limpaPost($_POST['telefone_deletar']);
            $email = limpaPost($_POST['email_deletar']);

            //Comando para deletar
            $deletar = $pdo->prepare("DELETE FROM clientes WHERE id = ? AND nome = ? AND idade = ? AND telefone = ? AND email = ?");
            $deletar->execute(array($id, $nome, $idade, $telefone, $email));

            echo "Deletado com sucesso";
        }
    ?>

    <?php 
        // Selecionando dados da tabela
        $sql = $pdo->prepare("SELECT * FROM clientes");
        $sql->execute();
        $dados = $sql->fetchAll();
    ?>

    <?php 
        // Verificar se tem dados (Array dados maior que zero)
        if(count($dados) > 0){
            // Constroi parte de cima da tabela
            echo "<table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>";

            // Laço de repetição para adicionar linha
            foreach($dados as $chave => $valor){
                echo "<tr>
                        <td>".$valor['id']."</td>
                        <td>".$valor['nome']."</td>
                        <td>".$valor['idade']."</td>
                        <td>".$valor['telefone']."</td>
                        <td>".$valor['email']."</td>
                        <td><a href='#' class='btn-editar' data-id='".$valor['id']."' data-nome='".$valor['nome']."' data-idade='".$valor['idade']."' data-telefone='".$valor['telefone']."' data-email='".$valor['email']."'>Editar</a> | <a href='#' class='btn-deletar' data-id='".$valor['id']."' data-nome='".$valor['nome']."' data-idade='".$valor['idade']."' data-telefone='".$valor['telefone']."' data-email='".$valor['email']."'>Deletar</a></td>
                    </tr>";
            }

            echo "</table>";
        }
        else{
            echo "<p>Nenhum cliente cadastrado</p>";
        }
    ?>
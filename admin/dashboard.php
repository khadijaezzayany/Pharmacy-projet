<?php require 'function.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->



    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/aside.css">
    <title>Document</title>
</head>

<body>
    <html>

    <body>

        <div class="dashboard">
            <?php
        include 'aside.php'
         ?>
            <h1>Ajouter Fournisseur</h1>

            <?php if (isset($_SESSION['response'])) { ?>
            <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <b><?= $_SESSION['response']; ?></b>
            </div>
            <?php } unset($_SESSION['response']); ?>

            <form action="" method="post">
                <input type="hidden" name='fourCode' value='<?= $fourCode; ?>'>


                <input type="text" name="fourNom" placeholder="Nom" value="<?= $fourNom; ?>" required>
                <input type="text" name="fourAdrs" placeholder="Adresse" value="<?= $fourAdrs; ?>" required>
                <input type=" text" name="fourVille" placeholder="Ville" value="<?= $fourVille; ?>" required>
                <input type="text" name="fourTélé" placeholder="Téléphone" value="<?= $fourTélé; ?>" required>

                <?php if($changefour==true) {?>
                <input type="submit" name="changefour" value="Modifier">
                <?php } else{?>
                <input type="submit" name="ajout-fournisseur" value="Ajouter">
                <?php } ?>





            </form>

            <br>
            <h1>Liste Fournisseurs</h1>


            <table>
                <thead>
                    <tr>
                        <th>Code Fournisseur </th>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Ville</th>
                        <th>Télèphone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $stmt=$db->query('SELECT * FROM fournisseur');
                while ($row = $stmt->fetch())
                    {
                ?>
                    <tr>
                        <td><?= $row['fourCode']; ?></td>
                        <td><?= $row['fourNom']; ?></td>
                        <td><?= $row['fourAdrs']; ?></td>
                        <td><?= $row['fourVille']; ?></td>
                        <td><?= $row['fourTélé']; ?></td>
                        <td>
                            <a href="dashboard.php?edit=<?= $row['fourCode'];?>" id="edit">Modifier</a> |
                            <a id="delete" href="dashboard.php?delete=<?= $row['fourCode'] ;?>"
                                onclick="return confirm ('Do you want delete this fournisseur?');">Supprimer</a>
                        </td>

                    </tr>
                    <?php }?>
                </tbody>
            </table>



        </div>

    </body>

    </html>
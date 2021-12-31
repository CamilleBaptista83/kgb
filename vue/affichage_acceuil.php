<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($donnees = $admin->fetch()) {
        ?>

            <tr>
                <th scope="row"><?= htmlspecialchars($donnees['admin_id_uuid']) ?></th>
                <td><?= $donnees['first_name']; ?></td>
                <td><?= $donnees['last_name']; ?></td>
                <td><?= $donnees['email']; ?></td>
                <td><?= $donnees['password']; ?></td>
                <td><?= $donnees['creation_date']; ?></td>
            </tr>

        <?php
        } // Fin de la boucle des billets
        $admin->closeCursor();
        ?>
    </tbody>
</table>
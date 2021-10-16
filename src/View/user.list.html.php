<a href="User/add" class="btn btn-primary" role="button">Ajouter un utilisateur</a>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Login</th>
            <th scope="col">Mail</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user->id ?></td>
                <td><?= $user->login ?></td>
                <td><?= $user->mail ?></td>
                <td><a class="btn btn-primary" href="User/modify/<?= $user->id ?>" role="button">modifier</a></td>
                <td><a class="btn btn-danger" href="User/delete/<?= $user->id ?>" role="button">supprimer</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
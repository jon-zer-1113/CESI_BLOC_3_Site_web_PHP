<!-- ALL THE USERS ARE DISPLAYED INTO A TABLE -->
<section class="back-office__all-users-superadmin-page">
    <h1 class="text-center">Espace superAdmin</h1>

    <article class="text-center">
        <h2 class="mt-3 mb-5">Gestion comptes utilisateurs</h2>
        <h3>Supprime les utilisateurs à la demande</h3>
        <p class="mt-4 mb-5 mx-auto">Cher <b>superAdmin</b>, c'est ici que tu peux supprimer<span>des comptes utilisateurs, à la demande de ces derniers.</span></p>
    </article>

    <article class="mt-5 text-center">
        <h2>Liste des utilisateurs <i class="fa-solid fa-users"></i></h2>
        <div class="container">
            <div class="row justify-content-center">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-dark mt-3">
                        <tr>
                            <th>Nom d'utilisateur</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($this->users as $user) : ?>
                            <tr>
                                <td><?= htmlspecialchars($user['username']) ?></td>
                                <td><?= htmlspecialchars($user['firstname']) ?></td>
                                <td><?= htmlspecialchars($user['lastname']) ?></td>
                                <td><?= htmlspecialchars($user['email']) ?></td>
                                <td><a href="index.php?p=supprimer-utilisateur&userId=<?= htmlspecialchars($user['userId']) ?>" class="btn btn-danger" onclick="return confirm('Es-tu sur de vouloir supprimer cet utilisateur 👤 ?')"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </article>

    <!-- NAVIGATION TO THE PREVIOUS PAGE -->
    <aside class="text-center mt-5">
        <nav>
            <a class="btn btn-success" href="index.php?p=comptes-utilisateurs" role="button">Retour</a>
        </nav>
    </aside>
</section>
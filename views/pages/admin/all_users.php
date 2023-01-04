<!-- ALL THE USERS ARE DISPLAYED INTO A TABLE -->
<section class="back-office__all-users-page">
    <h1 class="text-center">Gestion utilisateurs</h1>

    <article class="text-center">
        <h2 class="mt-3 mb-5">Consulte les utilisateurs</h2>
        <h3>Check les comptes existants !</h3>
        <p class="mt-4 mb-5 mx-auto">Voici la liste de l'ensemble des utilisateurs actuels. <span>La suppression de comptes est réservé au compte <b>superAdmin</b>.</span></p>
    </article>

    <article class="mt-5 text-center">

        <h2>Liste des utilisateurs <i class="fa-solid fa-users"></i></h2>
        <!-- NAVIGATION TO THE SUPER ADMIN PANEL -->
        <p><a class="btn btn-success mt-3" href="index.php?p=gestion-utilisateurs" role="button">Accès superAdmin</a></p>
        <div class="container">
            <div class="row justify-content-center">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-dark mt-3">
                        <thead>
                            <tr>
                                <th>Nom d'utilisateur</th>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->users as $user) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($user['username']) ?></td>
                                    <td><?= htmlspecialchars($user['firstname']) ?></td>
                                    <td><?= htmlspecialchars($user['lastname']) ?></td>
                                    <td><?= htmlspecialchars($user['email']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </article>
</section>
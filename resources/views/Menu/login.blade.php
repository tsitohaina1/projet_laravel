<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>
    <main>
        <div class="container">

          <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                  <div class="card mb-3">

                    <div class="card-body">
                        @if (session()->has('errors'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{session() -> get('errors')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                            </div>
                        @endif

                      <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Connectez-Vous!</h5>
                        <p class="text-center small">Entrez votre Nom d'utilisateur & Mot de passe</p>
                      </div>

                      <form class="row g-3 needs-validation" novalidate action="/se-connecter"  method="POST">
                            @csrf
                        <div class="col-12">
                          <label for="yourUsername" class="form-label">Nom d'Utiliisateur :</label>
                          <div class="input-group has-validation">
                            <input type="text" name="username" class="form-control" id="yourUsername" required>
                            <div class="invalid-feedback">Entrez votre Username.</div>
                          </div>
                        </div>

                        <div class="col-12">
                          <label for="yourPassword" class="form-label">Mot de Passe :</label>
                          <input type="password" name="password" class="form-control" id="yourPassword" required>
                          <div class="invalid-feedback">Votre mot de passe Svp!</div>
                        </div>


                        <div class="col-12">
                            <br><br>
                          <button class="btn btn-primary w-100" type="submit">Se Connecter</button>
                          <br>
                        </div>

                      </form>

                    </div>
                  </div>

                </div>
              </div>
            </div>

          </section>

        </div>
      </main><!-- End #main -->
</body>
</html>

function loadText1(){
    swal({
      title: 'Une bibliothèque en ligne ?',
      type: 'info',
      html:
          '<p>' + 'Le projet de la bibliothèque numérique s’intègre dans le cadre d’un mini projet demander par SESAME. ' + '</p>',
      width: 500,
      padding: '3em',
      showCloseButton: true,
      showCancelButton: true,
      focusCancel: false,
      cancelButtonText:'Fermer',
      cancelButtonColor: '#FF6500',
      popup: 'animated fadeInDown faster',
      popup: 'animated fadeOutUp',
      showConfirmButton: false,
      allowEscapeKey: true,
      allowEnterKey:false,
      scrollbarPadding: true,
      allowOutsideClick:false
    });
  }

  function loadText2(){
    swal({
      title: 'Autres media ?',
      type: 'info',
      html:
          '<p>' + 'La bibliothèque numérique est prévue pour accueillir à terme d’autres formats numériques : livres audios, vidéo…' + '</p>',
      width: 500,
      padding: '3em',
      showCloseButton: true,
      showCancelButton: true,
      focusCancel: false,
      cancelButtonText:'Fermer',
      cancelButtonColor: '#FF6500',
      popup: 'animated fadeInDown faster',
      popup: 'animated fadeOutUp',
      showConfirmButton: false,
      allowEscapeKey: true,
      allowEnterKey:false,
      scrollbarPadding: true,
      allowOutsideClick:false
    });
  }

  function loadText3(){
    swal({
      title: 'Objectifs de la bibliothèque ?',
      type: 'info',
      html:
            '<p>' + 'Les objectifs de la Bibliothèque numérique sont :'+ '<br>'+
            '- permettre aux usagers des bibliothèques d’emprunter des livres (nouveautés éditoriales) à distance gratuitement'+'<br>'+
            '- permettre aux usagers des bibliothèques de lire sur différents supports (ordinateur, smartphone, liseuses)'+'<br>'+
            '- proposer des livres (nouveautés éditoriales) téléchargeables sur les liseuses..' + '</p>',
      width: 520,
      padding: '3em',
      showCloseButton: true,
      showCancelButton: true,
      focusCancel: false,
      cancelButtonText:'Fermer',
      cancelButtonColor: '#FF6500',
      popup: 'animated fadeInDown faster',
      popup: 'animated fadeOutUp',
      showConfirmButton: false,
      allowEscapeKey: true,
      allowEnterKey:false,
      scrollbarPadding: true,
      allowOutsideClick:false
    });
  }

  function validationForm(){
    var email = document.getElementById('email_creer_compte').value;
    var password = document.getElementById('password_creer_compte').value;
    var nom = document.getElementById('nom_creer_compte').value;
    var prenom = document.getElementById('prenom_creer_compte').value;
    var genre = document.getElementById('genre_creer_compte').selectedIndex;
    var genreSelect = document.getElementById('genre_creer_compte').value;
    var adresse = document.getElementById('adresse_creer_compte').value;
    var dateNaissance = document.getElementById('date_naissance_creer_compte').value;
    var cin = document.getElementById('cin_creer_compte').value;
    var tel = document.getElementById('tel_creer_compte').value;

    testCompteUtilisateur(email, password, nom, prenom, genreSelect, adresse, dateNaissance, cin, tel );
    return false;
  }

function testCompteUtilisateur(email, password, nom, prenom, genre, adresse, dateNaissance, cin, tel){
  $.ajax({
    url:"../php/other_php/test_compte_utilisateur.php",
    method:"POST",
    data:{
      email:email
    },
    success:function(data){
      if(data == 'Ancien compte'){
        swal({
          type: "error",
          title:'Oups !',
          html:
          '<p>'+' Désolé : Cette Email est associé à un autre compte. Vérifier votre Email et Votre Password et ressayer une autre fois..'+'</p>',
          width: 400,
          padding: '3em',
          showCloseButton: true,
          showCancelButton: false,
          focusCancel: false,
          popup: 'animated fadeInDown faster',
          showConfirmButton: false,
          allowEscapeKey: false,
          allowEnterKey:false,
          scrollbarPadding: true,
          timer:6000,
          allowOutsideClick:false
        })
      }
      else if (data == 'Nouveau compte'){
        creerCompteUtilisateur(email, password, nom, prenom, genre, adresse, dateNaissance, cin, tel);
      }
    }
  })
}

function creerCompteUtilisateur(email, password, nom, prenom, genre, adresse, dateNaissance, cin, tel){
  $.ajax({
    url:"../php/other_php/creer_compte_utilisateur.php",
    method:"POST",
    data:{
      email:email,
      password:password,
      nom:nom,
      prenom:prenom,
      genre:genre,
      adresse:adresse,
      dateNaissance:dateNaissance,
      cin:cin,
      tel:tel
    },
    success:function(data){
      if(data == "Compte creer"){
        alertCompteCreer(email,nom,prenom);
      }

      else if(data == "Compte non creer"){
        alertCompteNonCreer(email);
      }
    }
  })
}

function alertCompteCreer(email,nom,prenom){
  swal({
      type: 'success',
      title:'Compte créer',
      html:
      '<p>'+' Trés bien <b>' +prenom +' '+ nom +'</b> Votre nouveau compte a été crée avec succé. Un Email de confirmation va être envoyer à votre boite Email.. '+'</p>',
      width: 400,
      padding: '3em',
      showCloseButton: false,
      showCancelButton: false,
      focusCancel: false,
      popup: 'animated fadeInDown faster',
      showConfirmButton: true,
      confirmButtonColor: '#FF6500',
      confirmButtonText:'Je confirme',
      allowEscapeKey: false,
      allowEnterKey:false,
      scrollbarPadding: true,
      allowOutsideClick:false
    })
    .then((result) => {
      envoieMailCreerCompte(email,prenom).then(creerSessionUtilisateur(email));

      })
  }

  async function envoieMailCreerCompte(email,prenom){
    $.ajax({
          url:"../php/other_php/send_confirmation_creer_compte.php",
          method:"POST",
          data:{
            email:email,
            prenom:prenom
          },

          success:function(data){
          }
        })
  }

  async function creerSessionUtilisateur(email){
    $.ajax({
      url:"../php/other_php/creer_session_utilisateur.php",
      method:"POST",
      data:{
        email:email
      },
      success:function(data){
        window.location = "../php/choix_livre.php";
      }
    })
  }

    function creerSessionAdmin(email){
    $.ajax({
      url:"../php/other_php/creer_session_admin.php",
      method:"POST",
      data:{
        email:email
      },
      success:function(data){
        window.location = "../php/gestion_compte.php";
      }
    })
  }

function alertCompteNonCreer(email){
  swal({
    type: 'error',
    title:'Oups !',
    html:
    "<p>"+" Désolé : Cette fonction n'est pas disponible pour le moment. Ressayer ultérieurement.."+"</p>",
    width: 400,
    padding: '3em',
    showCloseButton: true,
    showCancelButton: false,
    focusCancel: false,
    popup: 'animated fadeInDown faster',
    showConfirmButton: true,
    allowEscapeKey: false,
    allowEnterKey:false,
    scrollbarPadding: true,
    timer:4000,
    allowOutsideClick:false
  })
}

function verificationForm(){
  var email = document.getElementById('email_login').value;
  var password = document.getElementById('password_login').value;

   testCompteUtilisateurLogin(email, password);
   return false;
}

function testCompteUtilisateurLogin(email, password){
  if((email == 'admin@admin.com') && (password == 'admin')){
    chargementLoginAdmin(email);
  }

  else{
    $.ajax({
      url:"../php/other_php/test_compte_utilisateur_login.php",
      method:"POST",
      data:{
        email:email,
        password:password
      },
      success:function(data){
        if(data == 'Compte existe pas'){
          swal({
            type: "error",
            title:'Oups !',
            html:
            '<p>'+' Désolé : Aucune compte trouvée avec ces informations. Vérifier votre Email et votre Password et ressayer une autre fois..'+'</p>',
            width: 400,
            padding: '3em',
            showCloseButton: true,
            showCancelButton: false,
            focusCancel: false,
            popup: 'animated fadeInDown faster',
            showConfirmButton: false,
            allowEscapeKey: false,
            allowEnterKey:false,
            scrollbarPadding: true,
            timer:6000,
            allowOutsideClick:false
          })
        }
        else if(data == 'Compte existe'){
            chargementLogin(email);
        }
      }
    })
  }
}

function chargementLogin(email){
  swal({
    text: 'Connexion en cours..',
    title:'Connexion',
    allowEscapeKey: false,
    allowOutsideClick: false,
    padding:'3em',
    timer: 3000,
    onOpen: () => {
      swal.showLoading();
    }
  })
  .then(function() {
    swal({
      type: 'success',
      title:'Connecté',
      width: 400,
      padding: '3em',
      showCloseButton: false,
      showCancelButton: false,
      focusCancel: false,
      popup: 'animated fadeInDown faster',
      showConfirmButton: false,
      allowEscapeKey: false,
      allowEnterKey:false,
      scrollbarPadding: true,
      allowOutsideClick:false,
      timer:2000
    })
    .then(function() {
      $.ajax({
        url:"../php/other_php/creer_session_utilisateur.php",
        method:"POST",
        data:{
          email:email
        },
        success:function(data){
          window.location = "../php/choix_livre.php";
        }
      })
    })
  })
}

function chargementLoginAdmin(email){
  swal({
    text: 'Connexion en cours..',
    title:'Connexion',
    allowEscapeKey: false,
    allowOutsideClick: false,
    padding:'3em',
    timer: 3000,
    onOpen: () => {
      swal.showLoading();
    }
  })
  .then(function() {
    swal({
      type: 'success',
      title:'Connecté',
      width: 400,
      padding: '3em',
      showCloseButton: false,
      showCancelButton: false,
      focusCancel: false,
      popup: 'animated fadeInDown faster',
      showConfirmButton: false,
      allowEscapeKey: false,
      allowEnterKey:false,
      scrollbarPadding: true,
      allowOutsideClick:false,
      timer:2000
    })
    .then(function() {
      creerSessionAdmin(email);
    })
  })
}

  function envoyerMailContact(){
    var nom = document.getElementById('nom_prenom_contact').value;
    var email = document.getElementById('email_contact').value;
    var sujet = document.getElementById('sujet_contact').value;
    var message = document.getElementById('message_contact').value;

    chargementEnvoiMail().then(envoieMail(nom,email,sujet,message));
    return false;
  }

  async function chargementEnvoiMail(){
      swal({
        text: 'Envoi Email en cours..',
        title:'Envoi Email',
        allowEscapeKey: false,
        allowOutsideClick: false,
        padding:'3em',
        timer: 6000,
        onOpen: () => {
          swal.showLoading();
        }
      })
    }

  async function envoieMail(nom, email, sujet, message){
    $.ajax({
      url:"../php/other_php/send_contact_mail.php",
      method:"POST",
      data:{
        nom:nom,
        email:email,
        sujet:sujet,
        message:message
      },
      success:function(data){
        confirmationEnvoi();
      }
    })
  }

  function confirmationEnvoi(){
    swal({
      type: 'success',
      title:'Merci pour votre message',
      html:
      '<p>'+'Votre message a été envoyé avec succés. Notre service clientèle va répondre à votre message dans 24 heures.'+'</p>',
      width: 500,
      padding: '3em',
      showCloseButton: false,
      showCancelButton: false,
      focusCancel: false,
      popup: 'animated fadeInDown faster',
      showConfirmButton: false,
      allowEscapeKey: true,
      allowEnterKey:false,
      scrollbarPadding: true,
      timer: 6000,
      allowOutsideClick:false
    })
  }

    function testExistUtilisateurPasswordOublie(){
        var email = document.getElementById('email_password_oublie').value;
        $.ajax({
          url:"../php/other_php/test_compte_utilisateur.php",
          method:"POST",
          data:{
            email:email
          },
          success:function(data){
            if(data == 'Nouveau compte'){
              swal({
                type: "error",
                title:'Oups !',
                html:
                '<p>'+' Désolé : Aucune compte trouvée avec cette Email. Vérifier votre Email et ressayer une autre fois..'+'</p>',
                width: 400,
                padding: '3em',
                showCloseButton: true,
                showCancelButton: false,
                focusCancel: false,
                popup: 'animated fadeInDown faster',
                showConfirmButton: false,
                allowEscapeKey: false,
                allowEnterKey:false,
                scrollbarPadding: true,
                timer:6000,
                allowOutsideClick:false
              })
            }
            else if (data == 'Ancien compte'){
              genererCodeSecurite(email);
            }
          }
        })
        return false;
      }

      function genererCodeSecurite(email){
        var rand = Math.floor(Math.random() * 99999) + 00000;
        chargementEnvoiCodeSecurite().then(envoieCodeSecurite(rand,email));
      }

      async function chargementEnvoiCodeSecurite(){
        swal({
          text: 'Envoi code de sécurité en cours..',
          title:'Code de sécurité',
          allowEscapeKey: false,
          allowOutsideClick: false,
          padding:'3em',
          onOpen: () => {
            swal.showLoading();
          }
        })
      }

      async function envoieCodeSecurite(rand,email){
        $.ajax({
          url:"../php/other_php/send_code_securite.php",
          method:"POST",
          data:{
            rand:rand,
            email:email
          },
          success:function(data){
            encryptCode(email,rand);
          }
        })
      }

      function encryptCode(email,rand){
        $.ajax({
          url:"../php/other_php/encryptCode.php",
          method:"POST",
          data:{
            rand:rand
          },
          success:function(data){
            window.location = "../php/code_securite.php?rand=" + data + "&email=" + email;
          }
        })
      }

      function decryptCode(){
        const urlParams = new URLSearchParams(window.location.search);
        const rand = urlParams.get('rand');
        const email = urlParams.get('email');
        $.ajax({
          url:"../php/other_php/decryptCode.php",
          method:"POST",
          data:{
            rand:rand
          },
          success:function(data){
            testCodeEgalite(data,email);
          }
        })
        return false;
      }

      function testCodeEgalite(rand,email){
        var code_securite = document.getElementById('code_securite').value;
        if(code_securite == rand){
          alertequalCode(email);
        }
        else {
          alertNotEqualCode();
        }
      }

      function alertequalCode(email){
        swal({
          type: 'success',
          title:'Récupération du compte',
          html:
          '<p>'+'Votre compte a été récupéré avec succés. Vous devez modifier votre password pour utiliser le compte..'+'</p>',
          width: 500,
          padding: '3em',
          showCloseButton: false,
          showCancelButton: false,
          focusCancel: false,
          popup: 'animated fadeInDown faster',
          showConfirmButton: false,
          allowEscapeKey: true,
          allowEnterKey:false,
          scrollbarPadding: true,
          timer: 4000,
          allowOutsideClick:false
        })
        .then(function() {
          window.location = "../php/changePassword.php?email=" + email;
        })
      }

      function alertNotEqualCode(){
        swal({
          type: 'error',
          title:'Oups !',
          html:
          '<p>'+'Désolé : Le code de sécurité entré est incorrect. Merci de vérifier le code et ressayer une autre fois..'+'</p>',
          width: 500,
          padding: '3em',
          showCloseButton: false,
          showCancelButton: false,
          focusCancel: false,
          popup: 'animated fadeInDown faster',
          showConfirmButton: false,
          allowEscapeKey: true,
          allowEnterKey:false,
          scrollbarPadding: true,
          timer: 4000,
          allowOutsideClick:false
        })
      }

      function testEgalitePassword(){
        var password = document.getElementById('new_password').value;
        var rep_password = document.getElementById('rep_new_password').value;
        const urlParams = new URLSearchParams(window.location.search);
        const email = urlParams.get('email');
        if(password == rep_password){
          updatePassword(email,password);
        }
        else{
          alertPasswordNotEgal();
        }
        return false;
      }

      function alertPasswordNotEgal(){
        swal({
          type: 'error',
          title:'Oups !',
          html:
          '<p>'+'Désolé : Les deux Password ne sont pas identiques..'+'</p>',
          width: 500,
          padding: '3em',
          showCloseButton: true,
          showCancelButton: false,
          focusCancel: false,
          popup: 'animated fadeInDown faster',
          showConfirmButton: false,
          allowEscapeKey: true,
          allowEnterKey:false,
          scrollbarPadding: true,
          timer: 4000,
          allowOutsideClick:false
        })
      }

      function updatePassword(email,password){
        $.ajax({
          url:"../php/other_php/update_password.php",
          method:"POST",
          data:{
            email:email,
            password:password
          },
          success:function(data){
            alertPasswordChange(email);
          }
        })
      }

      function alertPasswordChange(email){
        swal({
          type: 'success',
          title:'Password modifié',
          html:
          '<p>'+'Très bien ! Votre Password a été changé avec succés. Vous pouvez utiliser votre compte normalment..'+'</p>',
          width: 500,
          padding: '3em',
          showCloseButton: false,
          showCancelButton: false,
          focusCancel: false,
          popup: 'animated fadeInDown faster',
          showConfirmButton: false,
          allowEscapeKey: true,
          allowEnterKey:false,
          scrollbarPadding: true,
          timer: 4000,
          allowOutsideClick:false
        })
        .then(function() {
          creerSessionUtilisateur(email);
        })
      }

      function updateCompte(){
        var email = document.getElementById('email_profil_modif').value;
        var prenom = document.getElementById('prenom_profil_modif').value;
        var nom = document.getElementById('nom_profil_modif').value;
        var genre = document.getElementById('genre_profil_modif').value;
        var adresse = document.getElementById('adresse_profil_modif').value;
        var date_naissance = document.getElementById('date_naissance_profil_modif').value;
        var cin = document.getElementById('cin_profil_modif').value;
        var mobile = document.getElementById('mobile_profil_modif').value;

        chargementUpdateCompte(email,prenom,nom,genre,adresse,date_naissance,cin,mobile);
        return false;
      }

      function chargementUpdateCompte(email,prenom,nom,genre,adresse,date_naissance,cin,mobile){
        swal({
          text: 'Modifier profil en cours..',
          title:'Modifier profil',
          allowEscapeKey: false,
          allowOutsideClick: false,
          padding:'3em',
          timer: 4000,
          onOpen: () => {
            swal.showLoading();
          }
        })
          .then(function() {
            updateCompteUtilisateur(email,prenom,nom,genre,adresse,date_naissance,cin,mobile);
          })
        }

        function updateCompteUtilisateur(email,prenom,nom,genre,adresse,date_naissance,cin,mobile){
           $.ajax({
             url:"../php/other_php/update_profil.php",
             method:"POST",
             data:{
               nom:nom,
               prenom:prenom,
               genre:genre,
               adresse:adresse,
               date_naissance:date_naissance,
               cin:cin,
               mobile:mobile,
               email:email
             },
             success:function(data){
               confirmationUpdateCompte();
             }
           })
         }

         function confirmationUpdateCompte(){
          swal({
            type: 'success',
            title:'Modification du profil',
            html:
            '<p>'+'Le profil a été modifié avec succés.'+'</p>',
            width: 500,
            padding: '3em',
            showCloseButton: false,
            showCancelButton: false,
            focusCancel: false,
            popup: 'animated fadeInDown faster',
            showConfirmButton: false,
            allowEscapeKey: true,
            allowEnterKey:false,
            scrollbarPadding: true,
            timer: 3000,
            allowOutsideClick:false
          })
          .then(function() {
            window.location = "../php/gestion_compte.php";
          })
        }

        function updateUtilisateur(){
          var email = document.getElementById('email_profil').value;
          var prenom = document.getElementById('prenom_profil').value;
          var nom = document.getElementById('nom_profil').value;
          var genre = document.getElementById('genre_profil').selectedIndex;
          var genreSelect = document.getElementById('genre_profil').value;
          var adresse = document.getElementById('adresse_profil').value;
          var date_naissance = document.getElementById('date_naissance_profil').value;
          var cin = document.getElementById('cin_profil').value;
          var mobile = document.getElementById('mobile_profil').value;

          chargementUpdateProfil(nom,prenom,genreSelect,adresse,date_naissance,cin,mobile,email);
          return false;
        }

        function chargementUpdateProfil(nom,prenom,genre,adresse,date_naissance,cin,mobile,email){
            swal({
              text: 'Modifier profil en cours..',
              title:'Modifier profil',
              allowEscapeKey: false,
              allowOutsideClick: false,
              padding:'3em',
              timer: 4000,
              onOpen: () => {
                swal.showLoading();
              }
            })
              .then(function() {
                updateProfil(nom,prenom,genre,adresse,date_naissance,cin,mobile,email);
              })
          }

         function updateProfil(nom,prenom,genre,adresse,date_naissance,cin,mobile,email){
            $.ajax({
              url:"../php/other_php/update_profil.php",
              method:"POST",
              data:{
                nom:nom,
                prenom:prenom,
                genre:genre,
                adresse:adresse,
                date_naissance:date_naissance,
                cin:cin,
                mobile:mobile,
                email:email
              },
              success:function(data){
                confirmationUpdate();
              }
            })
          }

           function confirmationUpdate(){
            swal({
              type: 'success',
              title:'Modification du profil',
              html:
              '<p>'+'Votre profil a été modifié avec succés.'+'</p>',
              width: 500,
              padding: '3em',
              showCloseButton: false,
              showCancelButton: false,
              focusCancel: false,
              popup: 'animated fadeInDown faster',
              showConfirmButton: false,
              allowEscapeKey: true,
              allowEnterKey:false,
              scrollbarPadding: true,
              timer: 3000,
              allowOutsideClick:false
            })
            .then(function() {
              window.location = "../php/profil.php";
            })
          }

          function choixGestion(){
            var index = document.getElementById("type_categorie").selectedIndex;
            if(index == 1){
              swal({
                text: 'Chargement des informations..',
                title:'Cinéma',
                allowEscapeKey: false,
                allowOutsideClick: false,
                padding:'3em',
                timer: 4000,
                onOpen: () => {
                  swal.showLoading();
                }
              })
                .then(function() {
                  loadCinema();
                })
            }
            else if(index == 2){
              swal({
                text: 'Chargement des informations..',
                title:'Développement personnel',
                allowEscapeKey: false,
                allowOutsideClick: false,
                padding:'3em',
                timer: 4000,
                onOpen: () => {
                  swal.showLoading();
                }
              })
                .then(function() {
                  loadDeveloppementPersonnel();
                })
            }
            else if(index == 3){
              swal({
                text: 'Chargement des informations..',
                title:'Economie',
                allowEscapeKey: false,
                allowOutsideClick: false,
                padding:'3em',
                timer: 4000,
                onOpen: () => {
                  swal.showLoading();
                }
              })
                .then(function() {
                  loadEconomie();
                })
            }
            else if(index == 4){
              swal({
                text: 'Chargement des informations..',
                title:'Histoire',
                allowEscapeKey: false,
                allowOutsideClick: false,
                padding:'3em',
                timer: 4000,
                onOpen: () => {
                  swal.showLoading();
                }
              })
                .then(function() {
                  loadHistoire();
                })
            }
            else if(index == 5){
              swal({
                text: 'Chargement des informations..',
                title:'Informatique',
                allowEscapeKey: false,
                allowOutsideClick: false,
                padding:'3em',
                timer: 4000,
                onOpen: () => {
                  swal.showLoading();
                }
              })
                .then(function() {
                  loadInformatique();
                })
            }
            else if(index == 6){
              swal({
                text: 'Chargement des informations..',
                title:'Littérature',
                allowEscapeKey: false,
                allowOutsideClick: false,
                padding:'3em',
                timer: 4000,
                onOpen: () => {
                  swal.showLoading();
                }
              })
                .then(function() {
                  loadLitterature();
                })
            }
            else if(index == 7){
              swal({
                text: 'Chargement des informations..',
                title:'Science',
                allowEscapeKey: false,
                allowOutsideClick: false,
                padding:'3em',
                timer: 4000,
                onOpen: () => {
                  swal.showLoading();
                }
              })
                .then(function() {
                  loadScience();
                })
            }
            else if(index == 8){
              swal({
                text: 'Chargement des informations..',
                title:'Sport',
                allowEscapeKey: false,
                allowOutsideClick: false,
                padding:'3em',
                timer: 4000,
                onOpen: () => {
                  swal.showLoading();
                }
              })
                .then(function() {
                  loadSport();
                })
            }
            else if(index == 9){
              swal({
                text: 'Chargement des informations..',
                title:'Tourisme',
                allowEscapeKey: false,
                allowOutsideClick: false,
                padding:'3em',
                timer: 4000,
                onOpen: () => {
                  swal.showLoading();
                }
              })
                .then(function() {
                  loadTourisme();
                })
            }
          }

          function loadCinema(){
            document.getElementById("cat").innerHTML = "Cinéma";
            document.getElementById("search_text").placeholder = "Chercher des livres de Cinéma..";
            document.getElementById("search_text").disabled = false;
            $(document).ready(function(){
              load_data();
                function load_data(query){
                  $.ajax({
                    url:"other_php/fetch_livre.php",
                    method:"POST",
                    data:{query:query,
                    categorie:'Cinéma'},
                    success:function(data){
                      $('#result').html(data);
                    }
                  });
                }
                $('#search_text').keyup(function(){
                  var search = $(this).val();
                  if(search != ''){
                    load_data(search);
                  }
                  else{
                    load_data();
                  }
                });
              });
            }

            function loadDeveloppementPersonnel(){
              document.getElementById("cat").innerHTML = "Développement Personnel";
              document.getElementById("search_text").placeholder = "Chercher des livres de Développement Personnel..";
              document.getElementById("search_text").disabled = false;
              $(document).ready(function(){
                load_data();
                  function load_data(query){
                    $.ajax({
                      url:"other_php/fetch_livre.php",
                      method:"POST",
                      data:{query:query,
                      categorie:'Développement personnel'},
                      success:function(data){
                        $('#result').html(data);
                      }
                    });
                  }
                  $('#search_text').keyup(function(){
                    var search = $(this).val();
                    if(search != ''){
                      load_data(search);
                    }
                    else{
                      load_data();
                    }
                  });
                });
            }

            function loadEconomie(){
              document.getElementById("cat").innerHTML = "Economie";
              document.getElementById("search_text").placeholder = "Chercher des livres d'Economie..";
              document.getElementById("search_text").disabled = false;
              $(document).ready(function(){
                load_data();
                  function load_data(query){
                    $.ajax({
                      url:"other_php/fetch_livre.php",
                      method:"POST",
                      data:{query:query,
                      categorie:'Economie'},
                      success:function(data){
                        $('#result').html(data);
                      }
                    });
                  }
                  $('#search_text').keyup(function(){
                    var search = $(this).val();
                    if(search != ''){
                      load_data(search);
                    }
                    else{
                      load_data();
                    }
                  });
                });
            }

            function loadHistoire(){
              document.getElementById("cat").innerHTML = "Histoire";
              document.getElementById("search_text").placeholder = "Chercher des livres d'Histoire..";
              document.getElementById("search_text").disabled = false;
              $(document).ready(function(){
                load_data();
                  function load_data(query){
                    $.ajax({
                      url:"other_php/fetch_livre.php",
                      method:"POST",
                      data:{query:query,
                      categorie:'Histoire'},
                      success:function(data){
                        $('#result').html(data);
                      }
                    });
                  }
                  $('#search_text').keyup(function(){
                    var search = $(this).val();
                    if(search != ''){
                      load_data(search);
                    }
                    else{
                      load_data();
                    }
                  });
                });
              }

              function loadInformatique(){
                document.getElementById("cat").innerHTML = "Informatique";
                document.getElementById("search_text").placeholder = "Chercher des livres d'Informatique..";
                document.getElementById("search_text").disabled = false;
                $(document).ready(function(){
                  load_data();
                    function load_data(query){
                      $.ajax({
                        url:"other_php/fetch_livre.php",
                        method:"POST",
                        data:{query:query,
                        categorie:'Informatique'},
                        success:function(data){
                          $('#result').html(data);
                        }
                      });
                    }
                    $('#search_text').keyup(function(){
                      var search = $(this).val();
                      if(search != ''){
                        load_data(search);
                      }
                      else{
                        load_data();
                      }
                    });
                  });
                }

                function loadLitterature(){
                  document.getElementById("cat").innerHTML = "Littérature";
                  document.getElementById("search_text").placeholder = "Chercher des livres de Littérature..";
                  document.getElementById("search_text").disabled = false;
                  $(document).ready(function(){
                    load_data();
                      function load_data(query){
                        $.ajax({
                          url:"other_php/fetch_livre.php",
                          method:"POST",
                          data:{query:query,
                          categorie:'Littérature'},
                          success:function(data){
                            $('#result').html(data);
                          }
                        });
                      }
                      $('#search_text').keyup(function(){
                        var search = $(this).val();
                        if(search != ''){
                          load_data(search);
                        }
                        else{
                          load_data();
                        }
                      });
                    });
                  }

                  function loadScience(){
                    document.getElementById("cat").innerHTML = "Science";
                    document.getElementById("search_text").placeholder = "Chercher des livres de Science..";
                    document.getElementById("search_text").disabled = false;
                    $(document).ready(function(){
                      load_data();
                        function load_data(query){
                          $.ajax({
                            url:"other_php/fetch_livre.php",
                            method:"POST",
                            data:{query:query,
                            categorie:'Science'},
                            success:function(data){
                              $('#result').html(data);
                            }
                          });
                        }
                        $('#search_text').keyup(function(){
                          var search = $(this).val();
                          if(search != ''){
                            load_data(search);
                          }
                          else{
                            load_data();
                          }
                        });
                      });
                    }

                    function loadSport(){
                      document.getElementById("cat").innerHTML = "Sport";
                      document.getElementById("search_text").placeholder = "Chercher des livres de Sport..";
                      document.getElementById("search_text").disabled = false;
                      $(document).ready(function(){
                        load_data();
                          function load_data(query){
                            $.ajax({
                              url:"other_php/fetch_livre.php",
                              method:"POST",
                              data:{query:query,
                              categorie:'Sport'},
                              success:function(data){
                                $('#result').html(data);
                              }
                            });
                          }
                          $('#search_text').keyup(function(){
                            var search = $(this).val();
                            if(search != ''){
                              load_data(search);
                            }
                            else{
                              load_data();
                            }
                          });
                        });
                      }

                      function loadTourisme(){
                        document.getElementById("cat").innerHTML = "Tourisme";
                        document.getElementById("search_text").placeholder = "Chercher des livres de Tourisme..";
                        document.getElementById("search_text").disabled = false;
                        $(document).ready(function(){
                          load_data();
                            function load_data(query){
                              $.ajax({
                                url:"other_php/fetch_livre.php",
                                method:"POST",
                                data:{query:query,
                                categorie:'Tourisme'},
                                success:function(data){
                                  $('#result').html(data);
                                }
                              });
                            }
                            $('#search_text').keyup(function(){
                              var search = $(this).val();
                              if(search != ''){
                                load_data(search);
                              }
                              else{
                                load_data();
                              }
                            });
                          });
                        }

                        function ouvriModalAjouterLivre(){
                          swal({
                          type: 'info',
                          title:'Ajouter des livres',
                          html:
                             '<form name = "f" id = "f" method = "POST" class = "login100-form center_form md-form" action = "../php/other_php/ajouter_livre.php" enctype = "multipart/form-data">' +
                             '<div class = "wrap-input100 code_input">' +
                                 '<input class = "input100" type = "text" name = "titre_livre" id = "titre_livre" required placeholder = "Titre *" required>' +
                                 '<span class = "focus-input100"></span>' +
                                 '<span class = "symbol-input100">' +
                                    '<i class = "fa fa-header"></i>' +
                                 '</span>'+
                             '</div>' +
                             '<div class = "wrap-input100 code_input">' +
                                 '<input class = "input100" type = "text" name = "auteur_livre" id = "auteur_livre" required placeholder = "Auteur *">' +
                                 '<span class = "focus-input100"></span>'+
                                 '<span class = "symbol-input100">'+
                                          '<i class = "fa fa-user" aria-hidden = "true"></i>'+
                                 '</span>'+
                             '</div>' +
                             '<div class = "wrap-input100 code_input">' +
                                 '<input class = "input100" type = "number" name = "date_imprim_livre" id = "date_imprim_livre" placeholder = "Année de édition *" maxlength = "4" required">' +
                                 '<span class = "focus-input100"></span>'+
                                 '<span class = "symbol-input100">'+
                                          '<i class = "fa fa-calendar" aria-hidden = "true"></i>'+
                                 '</span>'+
                             '</div>' +
                             '<div class = "wrap-input100 code_input">' +
                                 '<input class = "input100" type = "number" name = "nbr_page_livre" id = "nbr_page_livre" placeholder = "Nombre des pages *" required>' +
                                 '<span class = "focus-input100"></span>'+
                                 '<span class = "symbol-input100">'+
                                          '<i class = "fa fa-file" aria-hidden = "true"></i>'+
                                 '</span>'+
                             '</div>' +
                             '<div class = "wrap-input100 code_input">' +
                                 '<select class = "input100" name = "categorie_livre" id = "categorie_livre" required>'+
                                   '<option disabled selected>Catégorie</option>'+
                                   '<option>Cinéma</option>'+
                                   '<option>Développement personnel</option>'+
                                  '<option>Economie</option>'+
                                  '<option>Histoire</option>'+
                                  '<option>Informatique</option>'+
                                  '<option>Littérature</option>'+
                                  '<option>Science</option>'+
                                  '<option>Sport</option>'+
                                  '<option>Tourisme</option>'+
                                 '</select>' +
                                 '<span class = "focus-input100"></span>'+
                                 '<span class = "symbol-input100">'+
                                          '<i class = "fa fa-book" aria-hidden = "true"></i>' +
                                 '</span>'+
                             '</div>' +
                             '<div class = "file-field">'+
                                '<span class = "focus-input100"></span>'+
                                '<div class = "btn btn-secondary btn-sm float-left">'+
                                  '<span>Image de livre</span>'+
                                  '<input type = "file" name = "image_livre" id = "image_livre" required>'+
                                '</div>'+
                             '</div>'+
                             '<div class = "file-field">'+
                                '<span class = "focus-input100"></span>'+
                                '<div class = "btn btn-secondary btn-sm float-left">'+
                                  '<span>PDF de livre</span>'+
                                  '<input type = "file" name = "pdf_livre" id = "pdf_livre" accept = "application/pdf" required>'+
                                '</div>'+
                             '</div>'+
                             '<div class = "file-field">'+
                                '<span class = "focus-input100"></span>'+
                                '<div class = "btn btn-secondary btn-sm float-left">'+
                                  '<span>Audio de livre</span>'+
                                  '<input type = "file" name = "mp3_livre" id = "mp3_livre" accept = "application/audio" required>'+
                                '</div>'+
                             '</div>'+
                             '<div class = "container-login100-form-btn code_btn">' +
                                 '<input type = "submit" class = "login100-form-btn" name = "ajouter_livre" id = "ajouter_livre" value = "Ajouter le livre">	' +
                             ' </div>' +
                          '</form>',
                          width: 420,
                          padding: '3em',
                          showCloseButton: true,
                          showCancelButton: false,
                          focusCancel: false,
                          popup: 'animated fadeInDown faster',
                          showConfirmButton: false,
                          allowEscapeKey: false,
                          allowEnterKey:false,
                          scrollbarPadding: true,
                          allowOutsideClick:false
                        })
                        }

                        function choixCategorieLivre(){
                          var index = document.getElementById("type_categorie").selectedIndex;
                          if(index == 1){
                            swal({
                              text: 'Chargement des informations..',
                              title:'Cinéma',
                              allowEscapeKey: false,
                              allowOutsideClick: false,
                              padding:'3em',
                              timer: 4000,
                              onOpen: () => {
                                swal.showLoading();
                              }
                            })
                              .then(function() {
                                loadCinemaLivre();
                              })
                          }
                          else if(index == 2){
                            swal({
                              text: 'Chargement des informations..',
                              title:'Développement personnel',
                              allowEscapeKey: false,
                              allowOutsideClick: false,
                              padding:'3em',
                              timer: 4000,
                              onOpen: () => {
                                swal.showLoading();
                              }
                            })
                              .then(function() {
                                loadDeveloppementPersonnelLivre();
                              })
                          }
                          else if(index == 3){
                            swal({
                              text: 'Chargement des informations..',
                              title:'Economie',
                              allowEscapeKey: false,
                              allowOutsideClick: false,
                              padding:'3em',
                              timer: 4000,
                              onOpen: () => {
                                swal.showLoading();
                              }
                            })
                              .then(function() {
                                loadEconomieLivre();
                              })
                          }
                          else if(index == 4){
                            swal({
                              text: 'Chargement des informations..',
                              title:'Histoire',
                              allowEscapeKey: false,
                              allowOutsideClick: false,
                              padding:'3em',
                              timer: 4000,
                              onOpen: () => {
                                swal.showLoading();
                              }
                            })
                              .then(function() {
                                loadHistoireLivre();
                              })
                          }
                          else if(index == 5){
                            swal({
                              text: 'Chargement des informations..',
                              title:'Informatique',
                              allowEscapeKey: false,
                              allowOutsideClick: false,
                              padding:'3em',
                              timer: 4000,
                              onOpen: () => {
                                swal.showLoading();
                              }
                            })
                              .then(function() {
                                loadInformatiqueLivre();
                              })
                          }
                          else if(index == 6){
                            swal({
                              text: 'Chargement des informations..',
                              title:'Littérature',
                              allowEscapeKey: false,
                              allowOutsideClick: false,
                              padding:'3em',
                              timer: 4000,
                              onOpen: () => {
                                swal.showLoading();
                              }
                            })
                              .then(function() {
                                loadLitteratureLivre();
                              })
                          }
                          else if(index == 7){
                            swal({
                              text: 'Chargement des informations..',
                              title:'Science',
                              allowEscapeKey: false,
                              allowOutsideClick: false,
                              padding:'3em',
                              timer: 4000,
                              onOpen: () => {
                                swal.showLoading();
                              }
                            })
                              .then(function() {
                                loadScienceLivre();
                              })
                          }
                          else if(index == 8){
                            swal({
                              text: 'Chargement des informations..',
                              title:'Sport',
                              allowEscapeKey: false,
                              allowOutsideClick: false,
                              padding:'3em',
                              timer: 4000,
                              onOpen: () => {
                                swal.showLoading();
                              }
                            })
                              .then(function() {
                                loadSportLivre();
                              })
                          }
                          else if(index == 9){
                            swal({
                              text: 'Chargement des informations..',
                              title:'Tourisme',
                              allowEscapeKey: false,
                              allowOutsideClick: false,
                              padding:'3em',
                              timer: 4000,
                              onOpen: () => {
                                swal.showLoading();
                              }
                            })
                              .then(function() {
                                loadTourismeLivre();
                              })
                          }
                        }

                        function loadCinemaLivre(){
                          document.getElementById("cat").innerHTML = "Cinéma";
                          document.getElementById("search_text").placeholder = "Chercher des livres de Cinéma..";
                          document.getElementById("search_text").disabled = false;
                          $(document).ready(function(){
                            load_data();
                              function load_data(query){
                                $.ajax({
                                  url:"other_php/fetch_liste_livre.php",
                                  method:"POST",
                                  data:{query:query,
                                  categorie:'Cinéma'},
                                  success:function(data){
                                    $('#result').html(data);
                                  }
                                });
                              }
                              $('#search_text').keyup(function(){
                                var search = $(this).val();
                                if(search != ''){
                                  load_data(search);
                                }
                                else{
                                  load_data();
                                }
                              });
                            });
                          }

                          function loadDeveloppementPersonnelLivre(){
                            document.getElementById("cat").innerHTML = "Développement Personnel";
                            document.getElementById("search_text").placeholder = "Chercher des livres de Développement Personnel..";
                            document.getElementById("search_text").disabled = false;
                            $(document).ready(function(){
                              load_data();
                                function load_data(query){
                                  $.ajax({
                                    url:"other_php/fetch_liste_livre.php",
                                    method:"POST",
                                    data:{query:query,
                                    categorie:'Développement personnel'},
                                    success:function(data){
                                      $('#result').html(data);
                                    }
                                  });
                                }
                                $('#search_text').keyup(function(){
                                  var search = $(this).val();
                                  if(search != ''){
                                    load_data(search);
                                  }
                                  else{
                                    load_data();
                                  }
                                });
                              });
                          }

                          function loadEconomieLivre(){
                            document.getElementById("cat").innerHTML = "Economie";
                            document.getElementById("search_text").placeholder = "Chercher des livres d'Economie..";
                            document.getElementById("search_text").disabled = false;
                            $(document).ready(function(){
                              load_data();
                                function load_data(query){
                                  $.ajax({
                                    url:"other_php/fetch_liste_livre.php",
                                    method:"POST",
                                    data:{query:query,
                                    categorie:'Economie'},
                                    success:function(data){
                                      $('#result').html(data);
                                    }
                                  });
                                }
                                $('#search_text').keyup(function(){
                                  var search = $(this).val();
                                  if(search != ''){
                                    load_data(search);
                                  }
                                  else{
                                    load_data();
                                  }
                                });
                              });
                          }

                          function loadHistoireLivre(){
                            document.getElementById("cat").innerHTML = "Histoire";
                            document.getElementById("search_text").placeholder = "Chercher des livres d'Histoire..";
                            document.getElementById("search_text").disabled = false;
                            $(document).ready(function(){
                              load_data();
                                function load_data(query){
                                  $.ajax({
                                    url:"other_php/fetch_liste_livre.php",
                                    method:"POST",
                                    data:{query:query,
                                    categorie:'Histoire'},
                                    success:function(data){
                                      $('#result').html(data);
                                    }
                                  });
                                }
                                $('#search_text').keyup(function(){
                                  var search = $(this).val();
                                  if(search != ''){
                                    load_data(search);
                                  }
                                  else{
                                    load_data();
                                  }
                                });
                              });
                            }

                            function loadInformatiqueLivre(){
                              document.getElementById("cat").innerHTML = "Informatique";
                              document.getElementById("search_text").placeholder = "Chercher des livres d'Informatique..";
                              document.getElementById("search_text").disabled = false;
                              $(document).ready(function(){
                                load_data();
                                  function load_data(query){
                                    $.ajax({
                                      url:"other_php/fetch_liste_livre.php",
                                      method:"POST",
                                      data:{query:query,
                                      categorie:'Informatique'},
                                      success:function(data){
                                        $('#result').html(data);
                                      }
                                    });
                                  }
                                  $('#search_text').keyup(function(){
                                    var search = $(this).val();
                                    if(search != ''){
                                      load_data(search);
                                    }
                                    else{
                                      load_data();
                                    }
                                  });
                                });
                              }

                              function loadLitteratureLivre(){
                                document.getElementById("cat").innerHTML = "Littérature";
                                document.getElementById("search_text").placeholder = "Chercher des livres de Littérature..";
                                document.getElementById("search_text").disabled = false;
                                $(document).ready(function(){
                                  load_data();
                                    function load_data(query){
                                      $.ajax({
                                        url:"other_php/fetch_liste_livre.php",
                                        method:"POST",
                                        data:{query:query,
                                        categorie:'Littérature'},
                                        success:function(data){
                                          $('#result').html(data);
                                        }
                                      });
                                    }
                                    $('#search_text').keyup(function(){
                                      var search = $(this).val();
                                      if(search != ''){
                                        load_data(search);
                                      }
                                      else{
                                        load_data();
                                      }
                                    });
                                  });
                                }

                                function loadScienceLivre(){
                                  document.getElementById("cat").innerHTML = "Science";
                                  document.getElementById("search_text").placeholder = "Chercher des livres de Science..";
                                  document.getElementById("search_text").disabled = false;
                                  $(document).ready(function(){
                                    load_data();
                                      function load_data(query){
                                        $.ajax({
                                          url:"other_php/fetch_liste_livre.php",
                                          method:"POST",
                                          data:{query:query,
                                          categorie:'Science'},
                                          success:function(data){
                                            $('#result').html(data);
                                          }
                                        });
                                      }
                                      $('#search_text').keyup(function(){
                                        var search = $(this).val();
                                        if(search != ''){
                                          load_data(search);
                                        }
                                        else{
                                          load_data();
                                        }
                                      });
                                    });
                                  }

                                  function loadSportLivre(){
                                    document.getElementById("cat").innerHTML = "Sport";
                                    document.getElementById("search_text").placeholder = "Chercher des livres de Sport..";
                                    document.getElementById("search_text").disabled = false;
                                    $(document).ready(function(){
                                      load_data();
                                        function load_data(query){
                                          $.ajax({
                                            url:"other_php/fetch_liste_livre.php",
                                            method:"POST",
                                            data:{query:query,
                                            categorie:'Sport'},
                                            success:function(data){
                                              $('#result').html(data);
                                            }
                                          });
                                        }
                                        $('#search_text').keyup(function(){
                                          var search = $(this).val();
                                          if(search != ''){
                                            load_data(search);
                                          }
                                          else{
                                            load_data();
                                          }
                                        });
                                      });
                                    }

                                    function loadTourismeLivre(){
                                      document.getElementById("cat").innerHTML = "Tourisme";
                                      document.getElementById("search_text").placeholder = "Chercher des livres de Tourisme..";
                                      document.getElementById("search_text").disabled = false;
                                      $(document).ready(function(){
                                        load_data();
                                          function load_data(query){
                                            $.ajax({
                                              url:"other_php/fetch_liste_livre.php",
                                              method:"POST",
                                              data:{query:query,
                                              categorie:'Tourisme'},
                                              success:function(data){
                                                $('#result').html(data);
                                              }
                                            });
                                          }
                                          $('#search_text').keyup(function(){
                                            var search = $(this).val();
                                            if(search != ''){
                                              load_data(search);
                                            }
                                            else{
                                              load_data();
                                            }
                                          });
                                        });
                                      }

function reserverDeslivres(){
    var email = document.getElementById('email_reserve_livre').value;
    var titre = document.getElementById('titre_reserve_livre').value;
    var auteur = document.getElementById('auteur_reserve_livre').value;
    var categorie = document.getElementById('categorie_reserve_livre').selectedIndex;
    var categorieSelect = document.getElementById('categorie_reserve_livre').value;
    chargementReserverDeslivres(email,titre,auteur,categorieSelect);
    return false;
  }

  function chargementReserverDeslivres(email,titre,auteur,categorieSelect){
    swal({
      text: 'Réservation des livres en cours..',
      title:'Réservation des livres',
      allowEscapeKey: false,
      allowOutsideClick: false,
      padding:'3em',
      timer: 4000,
      onOpen: () => {
        swal.showLoading();
      }
    })
      .then(function() {
        reserverDesLivresPHP(email,titre,auteur,categorieSelect);
      })
    }

    function reserverDesLivresPHP(email,titre,auteur,categorieSelect){
       $.ajax({
         url:"../php/other_php/reserver_des_livres.php",
         method:"POST",
         data:{
           email:email,
           titre:titre,
           auteur:auteur,
           categorie:categorieSelect
         },
         success:function(data){
           confirmationReserverDesLivres();
         }
       })
     }

     function confirmationReserverDesLivres(){
      swal({
        type: 'success',
        title:'Réservation des livres',
        html:
        '<p>'+'Vous avez résérvé un livre. Notre service clientèle va repondre à votre réservation dans 72 heures..'+'</p>',
        width: 500,
        padding: '3em',
        showCloseButton: false,
        showCancelButton: false,
        focusCancel: false,
        popup: 'animated fadeInDown faster',
        showConfirmButton: false,
        allowEscapeKey: true,
        allowEnterKey:false,
        scrollbarPadding: true,
        timer: 4000,
        allowOutsideClick:false
      })
      .then(function() {
        window.location = "../php/reserve_livre.php";
      })
    }

    

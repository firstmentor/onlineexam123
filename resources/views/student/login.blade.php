<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student login</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../backend/css/bootstrap.min.css">

  <link rel="stylesheet" href="../backend/css/style.css">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <!-- required meta tags essential for seo and link sharing -->

  <!-- Enter a proper description for the page in the meta description tag -->
  <meta name="description" content="">

  <!-- Enter a keywords for the page in tag -->
  <meta name="Keywords" content="PNINFOSYS ONLINE EXAM">

  <!-- Enter Page title -->
  <meta property="og:title" content="ENTER_PAGE_TITLE" />
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript">
    BASE_URL = "<?php echo url(''); ?>";
  </script>
  <style>
  @media only screen and (min-width: 787px) {
        body{
          height:100%;
        }
        .sign_up .sign_up_form{
            overflow-y: auto;
            overflow-x:hidden;
            max-height: 100vh;
        }
        .sign_up .sign_up_form::-webkit-scrollbar {
           width: 6px;
         }

          /* Track */
          .sign_up .sign_up_form::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius:5px;
        }

          /* Handle */
          .sign_up .sign_up_form::-webkit-scrollbar-thumb {
            background: #888;
        }
   }
   @media only screen and (max-width: 786px) {
    .sign_up_form{
        padding: 25px !important;
    }
    .sign_up_form .title{
        text-align: center !important;
    }

    .btn-color.btn-block.sign_up_btn{
        position: relative;
        left:5px;
    }

   }

  .signin-image{
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    height:100%;
    position: relative;
  }
  .signin-image img{
    width:100%;
    object-fit: contain;
  }
  .sign_up_form{
    padding: 50px;
    margin-block: auto;
  }
  .sign_up_form .title{
    display: block;
    width: 100%;
    padding-bottom: 40px;
    font-size: 39px;
    color: #333;
    font-weight: bold;
    margin-bottom: 0 !important;
    line-height: 1.2;
    text-align: left;
  }
  .label-input100 {
    font-size: 18px;
    color: #999;
    display: block;
    font-weight: bold;
    line-height: 1.2;
    padding-left: 2px;
}
.input100{
  display: block;
    width: 100%;
    height: 50px;
    background: 0 0;
    font-family: Poppins-Regular;
    font-size: 22px;
    color: #555;
    line-height: 1.2;
    padding: 0 2px;
}input {
    outline: none;
    border: none;
}
.input_type{
  width: 100%;
  position: relative;
  border-bottom: 2px solid #dbdbdb;
  margin-bottom: 45px;
}
.signin-image{
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    position: relative;
  }
  .sign_up_form{
    padding: 50px;
  }
  .sign_up_form .title{
    display: block;
    width: 100%;
    padding-bottom: 40px;
    font-size: 39px;
    color: #333;
    font-weight: bold;
    margin-bottom: 0 !important;
    line-height: 1.2;
    text-align: left;
  }
  .label-input100 {
    font-size: 18px;
    color: #999;
    display: block;
    font-weight: bold;
    line-height: 1.2;
    padding-left: 2px;
}
.input100{
  display: block;
    width: 100%;
    height: 50px;
    background: 0 0;
    font-size: 15px;
    color: #555;
    line-height: 1.2;
    padding: 0 2px;
}input {
    outline: none;
    border: none;
}
.input_type{
  width: 100%;
  position: relative;
  border-bottom: 2px solid #dbdbdb;
  margin-bottom: 45px;
}
.alert-validate::after {
    content: "\f06a";
    font-family: FontAwesome;
    display: block;
    position: absolute;
    color: #c80000;
    font-size: 18px;
    bottom: calc((100% - 25px)/2);
    -webkit-transform: translateY(50%);
    -moz-transform: translateY(50%);
    -ms-transform: translateY(50%);
    -o-transform: translateY(50%);
    transform: translateY(50%);
    right: 8px;
}

.mb-4{
    margin-bottom: 2rem !important;
}
.btn-color{
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0 20px;
    /* min-width: 244px; */
    height: 50px;
    border-radius: 25px;
    font-size: 16px;
    color: #fff;
    outline: none!important;
    border: none;
    line-height: 1.2;
    position: absolute;
    z-index: 1;
    left: 0;
    background: linear-gradient(#34fafa, #9198e5);
}
input:focus{
    border-bottom: none !important;
}
.input_type:focus{
    border-bottom: 2px solid #c80000;
}
.eye-icon{
    right: 10%;
    top: 53%;
    z-index: 100;
}
.eye-icon i{
    font-size: 20px;
    color: #999;
}

  </style>
</head>
<body class="">
  <section class="sign_in">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 col-12 p-0">
        <div class="signin-image" >
          <img src="../images/software.jpg">
       </div>
      </div>
      <div class="col-lg-4 col-12 sign_up_form" >
        <div class="form_div">
        <h3 class="title" style="margin-bottom:30px;">Sign in</h3>
        <form method="POST" action="{{url('student/login_submit')}}" class="authenticate_user" style="margin:auto">
          @csrf
          <div class="form-group  input_type mb-4" style="position:relative;">
              <label for="your_name" class="label-input100">Email</label>
              <input type="email" name="email" id="email" class="input100" placeholder="Your Email">
          </div>
          <div class="form-group input_type  mb-4 password" style="position:relative;">
              <label for="your_pass" class="label-input100">Password</label>
              <input type="password" name="password" id="password" class="input100 position-relative" placeholder="Your Password">
              <span class="position-absolute eye-icon"><i class="fa fa-eye" aria-hidden="true"></i></span>

          </div>
               <div class="form-group mt-4">
                   <input type="checkbox"  name="rememberme">
                   <label class="label-remember">Remember me</label>
               </div>
            <div class="row mt-7 rowsignin">
                <div class="col-6"><button type="submit" class="btn btn-color btn-block sign_up_validate" >Sign In</button></div>
                <div class="col-6" style="text-align: center; display: flex; align-items:center; width:100%;"><a href="{{url('/student/register')}}" style="text-align:center;font-size:20px; padding:10px; color:#999; width:100%;">Sign up <i class="fa fa-long-arrow-right m-l-5"></i></a></div>
            </div>

         </form>
        </div>

         {{-- <div class="row mt-3 rowsignup">
             <div class="col-6" style="font-size:14px;">Not a member?<a href="recovery.php">&nbsp;Sign up</a></div>
             <div class="col-6" style="font-size:14px;"><a href="recovery.php" >&nbsp;forgot Password!</a></div>
         </div> --}}
      </div>

    </div>
    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="../backend/js/jquery-3.4.1.min.js"></script>
<script src="../backend/js/bootstrap.min.js"></script>
<script src="../../backend/docs/assets/js/custom.js"></script>
<script>
   $('.input_type.password .eye-icon').on('click',function(){
       if($(this).siblings('#password').attr('type') == 'password'){
           $(this).siblings('#password').attr('type','text');
       }else{
          $(this).siblings('#password').attr('type','password');
       }

   })
</script>
</body>
</html>


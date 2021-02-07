<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student Register</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../backend/css/bootstrap.min.css">

  <link rel="stylesheet" href="../backend/css/style.css">

  <!--  meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <!-- required meta tags essential for seo and link sharing -->

  <!-- Enter a proper description for the page in the meta description tag -->
  <meta name="description" content="">

  <!-- Enter a keywords for the page in tag -->
  <meta name="Keywords" content="">

  <!-- PNINFOSYS ONLINE EXAM -->
  <meta property="og:title" content="PNINFOSYS ONLINE EXAM" />
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
/* .alert-validate::after {
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
} */

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
input.error{
    border-bottom: 2px solid #c80000 !important;
}
.input_type select{
    border:none;
}
.input_type select:focus{
    outline: none;
    box-shadow: none;
}
.error{
  border-bottom: 2px solid #c80000 !important;
}
.form-group.form-group-add{
   border:none;
}
  </style>
</head>
<body>
<section class="sign_up">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 col-md-12 p-0">
        <div class="signin-image">
          <img src="../images/software.jpg">
       </div>
      </div>
      <div class="col-lg-4 col-md-12 sign_up_form">
        <h3 class="title" style="margin-bottom:30px;">Sign Up</h3>
        <form  action="{{ url('student/register_submit') }}" method="POST" class="all_add">
           @csrf
            <div class="form-group alert-validate input_type mb-4" style="position:relative;">
                <label for="your_name" class="label-input100">Full Name</label>
                <input type="text" name="name" id="name" class="input100" placeholder="Your Full Name" >
            </div>
            <div class="form-group alert-validate input_type mb-4" style="position:relative;">
                <label for="your_name" class="label-input100">Email</label>
                <input type="email" name="email" id="email" class="input100" placeholder="Your Email" >
            </div>
            <div class="form-group input_type mb-4" style="position:relative;">
                <label for="your_pass" class="label-input100">Password</label>
                <input type="password" name="password" id="password" class="input100" placeholder="Your Password" >
            </div>
            <div class="form-group input_type mb-4" style="position:relative;">
                <label for="your_pass" class="label-input100" >Repeat Password</label>
                <input id="password-confirm" type="password" class="input100" name="password_confirmation" onkeyup="matchPassword(this)" placeholder="Your Confirm Password" >
            </div>
            <div class="form-group input_type mb-4" style="position:relative;">
                <label for="your_pass" class="label-input100">Enter Date Of Birth</label>
                <input type="date" name="date_of_birth"  class="input100" placeholder="Your Date of Birth" >
            </div>
            <div class="form-group input_type mb-4" style="position:relative;">
                <label for="your_pass" class="label-input100">Enter Mobile Nn.</label>
                <input type="number" name="mobile_no" id="mobile_no" class="input100" placeholder="Your Mobile No" >
            </div>
            <div class="form-group input_type mb-4" style="position:relative;">
                <label for="your_pass" class="label-input100">Select Exam</label>
                <select name="exam"  class="form-control">
                    <option value="">Select</option>
                        @foreach ($exams as $exam)
                            <option  value="{{$exam['id']}}">{{$exam['title']}}</option>
                        @endforeach
                </select>
            </div>
            <div class="row mt-7 rowsignup">
                <div class="col-6"><button type="submit" class="btn btn-color btn-block sign_up_btn">Sign Up</button></div>
                <div class="col-6 p-0" style="text-align: center; display: flex; align-items:center; width:100%;"><a href="{{url('/')}}" style="text-align:center;font-size:20px; padding:10px; color:#999; width:100%;">Sign in <i class="fa fa-long-arrow-right m-l-5"></i></a></div>
            </div>
         </form>
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
  const matchPassword = (ref) => {
        if ($(ref).val() != $('#password').val()) {
          if (!$(ref).hasClass('error'))
            $(ref).addClass('error');
            $('#password-confirm').parents('.form-group').addClass('form-group-add');
        } else {
          if ($(ref).hasClass('error'))
            $(ref).removeClass('error');
            $('#password-confirm').parents('.form-group').removeClass('form-group-add');
        }
      }
</script>
</body>
</html>

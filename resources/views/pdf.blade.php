<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Certification</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<style>
@charset "UTF-8";

@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400&display=swap');

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: 'Montserrat', sans-serif;
}

a {
  color: #6f6f6f;
  text-decoration: none;
}


address {
    font-weight: 100;
    font-size: 14pt;
    font-style: normal;
    line-height: 135%;
}

h2,
h3 {
  font-weight: 300    
}

ul {
  color: #58595B;
  text-decoration: none;
  list-style-type: none;
  font-size: 9pt;
  font-weight: 300;
  text-align: right
}

.cert-container {
  position: relative;
  padding: 20px;
  border: 1px solid #6f6f6f;
  width: 95%;
  height: 750px;
  background-image: url();
  background-repeat: no-repeat;
  background-size: cover;
  margin: auto;
}

/* Certificate Outer Border (Gray) */
.border-gray {
  padding: 5px;
  border: 3px solid #58595B;
}

/* Certificate Inner Border (red) */
.border-red {
  border: 3px double green;
}

.content {
  padding: 10px;
  height: 700px;
  text-align: center;
}

/* Certificate, Host Server, and LMS IDs */
.credentials {
  position: absolute;
  right: 100px;
  top: 120px;  
}

.copytext-container{
  position: absolute;
  left: 190px;
  top: 275px; 
  text-align: left;
  line-height: 100%;
}

.congrats-copytext {
    margin-bottom: 70px;
}

.course-copytext {
    color: green;
    margin-bottom: 65px;
}

.address-copytext {
    line-height: 150%;
}

#mt-logo {
  width:350px;
  right: 610px;
  top: 105px;
}

#mt-stamp {
  width:144px;
  right: 130px;
  top: 550px;
}

#mt-site {
  color: #CE202F;
  font-size: 14pt;
    
}
#user-id-string {
    line-height: 7px;
}

#course-id-string {
    line-height: 7px;
}

@media print {
  @page {
    size: letter landscape;
    margin: 0;
    padding: 0;
  }
      .cert-container {
    border: none;
}

/*  
  background-image {
    image-resolution: 300dpi;
    }
*/
}

</style>

</head>
<body>
<div class="cert-container">
  <div class="border-gray">
    <div class="border-red">
      <div class="content">
          <img id="mt-logo" src="image/partner-logo-2.png" alt="Logo Goes Here" height="70px"style="width:70px;" />
          <br>
          <br>
          <br>
          <br>
              <ul class="credentials" style="margin-top:40px;">
                <li>
                    <p id="cert-id">Certificate Id: <span></span></p>
                </li>
              </ul>
            <div class="copytext-container">
                <div class="congrats-copytext">
                    <h1 style="width: 700px; margin-left:-160px;  ">Certificate of Completion In Education Website</h1><br>
                    <h2>Congratulations <span>{{$user['name']}}</span></h2><br>
                </div>
                <div class="course-copytext">
                    <h1><span>Course Tittle:{{$course->title}}</span></h1><br>
                    <h2>Course Completed on: <span>{{
                            $dt->format('Y-m-d H:i:s');}}
                    </span></h2><br>
                </div>
            </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>

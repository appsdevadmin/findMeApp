@extends('layouts.questionnaire_layout')
@section('content')

    <span id="show_onsubmit">
          <marquee width="100%" behavior="alternate" direction="right"><h2 class="header smaller lighter blue" align="center">Page loading, please wait...</h2><div class="spinner-grow text-success"></div></marquee>
</span>
    <span id="hide_onsubmit">
<!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container"><!--style="background-image: url('{{ asset('auto_assets/img/hero-bg5.jpg') }}');"-->

          <div class="section-title" data-aos="fade-up">
                     <hr/>
          <h2 class="animate__animated animate__bounceInDown">Tell us about your hospital visit<br/></h2>
                       <h5>This will help us improve your next experience!</h5>
          <h5><sub>All fields marked with (*) are compulsary.</sub></h5>

        </div>
                     <hr/>


        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
            <form action="#" method="post" role="form" id="reg_form" class="php-email-form">

              <div class="row">
                                  <label><h4><span style="color:#B29B35;">Basic Information</span></h4></label>
                                         <table class="table">
                                                   <thead>

                                                              <tr>
                                                                        <th>1. Age Bracket</th>
                                                                        <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="age" id="age" value="0-5" required>
                                                                                  <p>0 - 5 years</p>
                                                                                </td>
                                                                                  <td>

                                                                                  <input type="radio" name="age" id="age" value="6-10" required> 6 - 10 years</td>
                                                                                  <td>

                                                                                  <input type="radio" name="age" id="age" value="11-18" required> 11 - 18 years</td>
                                                                                  <td>

                                                                                  <input type="radio" name="age" id="age" value="19-59" required> 19 - 59 years</td>
                                                                                  <td>

                                                                                  <input type="radio" name="age" id="age" value=">60" required> Above 60 years</td>
                                                                        </div>
                                                              </tr>

                                                              <tr>
                                                              <th>2. Gender</th>
                                                                        <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="gender" id="gender" value="Male" required> Male </td>
                                                                                  <td>

                                                                                  <input type="radio" name="gender" id="gender" value="Female" required> Female</td>

                                                                        </div>
                                                                        
                                                              </tr>


                                                              <tr>
                                                              <th>3. Service (Employment) <br/>Status</th>
                                                              <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="employment_status" id="employment_status" value="Staff" required> Staff </td>
                                                                                  <td>

                                                                                  <input type="radio" name="employment_status" id="employment_status" value="Retiree" required> Retiree</td>

                                                                                  <td>
                                                                                  <input type="radio" name="employment_status" id="employment_status" value="Dependant" required> Dependant</td>

                                                                                  <td>
                                                                                  <input type="radio" name="employment_status" id="employment_status" value="Third Party" required> Third Party</td>

                                                                                  <td>
                                                                                  <input type="radio" name="employment_status" id="employment_status" value="Other" required> Other</td>
                                                                        </div>
                                                              </tr>


                                                              <tr>
                                                              <th>4. Fitness - sports, exercise and outdoor activities?</th>
                                                                        <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="fitness" id="fitness" value="Very Active" required> Very Active </td>
                                                                                  <td>

                                                                                  <input type="radio" name="fitness" id="fitness" value="Active" required> Active</td>
                                                                                  <td>

                                                                                  <input type="radio" name="fitness" id="fitness" value="Average" required> Average</td>
                                                                                  <td>

                                                                                  <input type="radio" name="fitness" id="fitness" value="Inactive" required>  Inactive</td>

                                                                                  <td>

                                                                                  <input type="radio" name="fitness" id="fitness" value="Very Inactive" required> Very Inactive</td>
                                                                        </div></tr>

                                                              <tr><th>5. Drinking and/or smoking</th>
                                                                        <div class="controls">
                                                                                  <td><input type="radio" name="drinking" id="drinking" value="Always" required> Always </td>
                                                                                  <td>

                                                                                  <input type="radio" name="drinking" id="drinking" value="Often" required> Often</td>
                                                                                  <td>

                                                                                  <input type="radio" name="drinking" id="drinking" value="Not at all" required> Not At All</td>
                                                                        </div>
                                                                        </tr>

                                                              <tr><th>6. Sleep Pattern</th>
                                                                        <div class="controls">
                                                                                  <td><input type="radio" name="sleep" id="sleep" value="Very Good" required> Always </td>
                                                                                  <td>

                                                                                  <input type="radio" name="sleep" id="sleep" value="Good" required> Good</td>

                                                                                  <td>
                                                                                  <input type="radio" name="sleep" id="sleep" value="Average" required> Average</td>
                                                                                  <td>
                                                                                  <input type="radio" name="sleep" id="sleep" value="Poor" required> Poor</td>
                                                                                  <td>
                                                                                  <input type="radio" name="sleep" id="sleep" value="Very Poor" required> Very Poor</td>

                                                                        </div>
                                                                        </tr>

                                                   </thead>
                                         </table>
              </div>
                                 <hr/>
              <div class="row">
                                 <label><h4><span style="color:#B29B35;">Select Unit *</span></h4></label>


                                                   <div class="btn-group mr-2" role="group" aria-label="First group">
                                                     <input type="radio" class="btn-check" name="registration_type" id="option1" autocomplete="off" onclick="nin_picker_();" />
                                                     <label class="btn btn-outline-success" for="option1"><div class="icon"><i class="bx bx-user"></i></div> Physician/Dentist</label>
                                                   &nbsp;&nbsp;
                                                     <input type="radio" class="btn-check" name="registration_type" id="option2" autocomplete="off" onclick="tin_picker_();"/>
                                                     <label class="btn btn-outline-warning" for="option2"><div class="icon"><i class="bx bx-world 2x"></i></div> Pharmacy</label>&nbsp;&nbsp;
                                                     <input type="radio" class="btn-check" name="registration_type" id="option3" autocomplete="off" onclick="tin_picker_();"/>
                                                     <label class="btn btn-outline-info" for="option3"><div class="icon"><i class="bx bx-world 2x"></i></div> Nursing Care</label>&nbsp;&nbsp;
                                                     <input type="radio" class="btn-check" name="registration_type" id="option4" autocomplete="off" onclick="nursing_care_();"/>
                                                     <label class="btn btn-outline-primary" for="option4"><div class="icon"><i class="bx bx-world 2x"></i></div> Laboratory Services</label>&nbsp;&nbsp;
                                                   </div>

                                                   <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                     <input type="radio" class="btn-check" name="registration_type" id="option5" autocomplete="off" onclick="tin_picker_();"/>
                                                     <label class="btn btn-outline-info" for="option5"><div class="icon"><i class="bx bx-world 2x"></i></div> Maternity & <br/>Ante-Natal Care</label>&nbsp;&nbsp;
                                                     <input type="radio" class="btn-check" name="registration_type" id="option6" autocomplete="off" onclick="tin_picker_();"/>
                                                     <label class="btn btn-outline-primary" for="option6"><div class="icon"><i class="bx bx-world 2x"></i></div> Imaging</label>&nbsp;&nbsp;
                                                     <input type="radio" class="btn-check" name="registration_type" id="option7" autocomplete="off" onclick="tin_picker_();"/>
                                                     <label class="btn btn-outline-success" for="option7"><div class="icon"><i class="bx bx-world 2x"></i></div> Front Desk</label>&nbsp;&nbsp;
                                                     <input type="radio" class="btn-check" name="registration_type" id="option8" autocomplete="off" onclick="tin_picker_();"/>
                                                     <label class="btn btn-outline-warning" for="option8"><div class="icon"><i class="bx bx-world 2x"></i></div> General Hospital<br/>Administration</label>
                                                   </div>

                               </div>
                               <hr/>

                               <div id="nin_picker" class="animate__animated animate__bounce">
                                         <div class="row">
                                  <label><h4><span style="color:#B29B35;">Physician/Dentist</span></h4></label>
                                         <table class="table">
                                                   <thead>

                                                              <tr>
                                                                        <th>1. What was the wait time to receive attention?</th>
                                                                        <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="physician_wait_time" id="physician_wait_time" value="0-15" required> &#128515;<br/> 0 - 15 minutes</td>
                                                                                  <td>

                                                                                  <input type="radio" name="physician_wait_time" id="physician_wait_time" value="15-30" required> &#127773;<br/>15 - 30 minutes</td>
                                                                                  <td>

                                                                                  <input type="radio" name="physician_wait_time" id="physician_wait_time" value="30-45" required> &#128542;<br/>30 - 45 minutes</td>
                                                                                  <td>

                                                                                  <input type="radio" name="physician_wait_time" id="physician_wait_time" value="45-60" required> &#128543;<br/>45 - 60 minutes</td>
                                                                                  <td>

                                                                                  <input type="radio" name="physician_wait_time" id="physician_wait_time" value=">60" required> &#128545;<br/>Above 60 minutes</td>
                                                                        </div>
                                                              </tr>

                                                              <tr>
                                                              <th>2. How satisfied are you with the quality of service received? </th>
                                                                        <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="physician_satisfactions" id="physician_satisfactions" value="Very Satisfied" required> &#128515;<br/> Very Satisfied</td>
                                                                                  <td>

                                                                                  <input type="radio" name="physician_satisfactions" id="physician_satisfactions" value=" Satisfied" required> &#127773;<br/> Satisfied</td>
                                                                                  <td>

                                                                                  <input type="radio" name="physician_satisfactions" id="physician_satisfactions" value="Average" required> &#128542;<br/>Average</td>
                                                                                  <td>

                                                                                  <input type="radio" name="physician_satisfactions" id="physician_satisfactions" value="Unsatisfied" required> &#128543;<br/>Unsatisfied</td>
                                                                                  <td>

                                                                                  <input type="radio" name="physician_satisfactions" id="physician_satisfactions" value=">Very Unsatisfied" required> &#128545;<br/>Very Unsatisfied</td>
                                                                        </div>
                                                              </tr>


                                                              <tr>
                                                              <th>3. How would you rate the investigative diagnosis that you underwent?</th>
                                                              <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="physician_diagnosis" id="physician_diagnosis" value="Very Good" required> &#128515;<br/> Very Good</td>
                                                                                  <td>

                                                                                  <input type="radio" name="physician_diagnosis" id="physician_diagnosis" value="Good" required> &#127773;<br/> Good</td>
                                                                                  <td>

                                                                                  <input type="radio" name="physician_diagnosis" id="physician_diagnosis" value="Average" required> &#128542;<br/>Average</td>
                                                                                  <td>

                                                                                  <input type="radio" name="physician_diagnosis" id="physician_diagnosis" value="Poor" required> &#128543;<br/>Poor</td>
                                                                                  <td>

                                                                                  <input type="radio" name="physician_diagnosis" id="physician_diagnosis" value=">Very Poor" required> &#128545;<br/>Very Poor</td>
                                                                        </div>
                                                              </tr>


                                                              <tr>
                                                              <th>4. Were you referred to another healthcare provider?</th>
                                                                        <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="reffered" id="reffered" value="Yes" required>&#10004;<br/> Yes </td>
                                                                                  <td>

                                                                                  <input type="radio" name="reffered" id="reffered" value="No" required>&#10060;<br/> No</td>


                                                                        </div></tr>

                                                              <tr><th>5. How would you rate the hygiene/ambience level of the consulting room?</th>
                                                                        <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="consulting_room_hygiene" id="consulting_room_hygiene" value="Very Good" required> &#128515;<br/> Very Good</td>
                                                                                  <td>

                                                                                  <input type="radio" name="consulting_room_hygiene" id="consulting_room_hygiene" value="Good" required> &#127773;<br/> Good</td>
                                                                                  <td>

                                                                                  <input type="radio" name="consulting_room_hygiene" id="consulting_room_hygiene" value="Average" required> &#128542;<br/>Average</td>
                                                                                  <td>

                                                                                  <input type="radio" name="consulting_room_hygiene" id="consulting_room_hygiene" value="Poor" required> &#128543;<br/>Poor</td>
                                                                                  <td>

                                                                                  <input type="radio" name="physician_diagnosis" id="physician_diagnosis" value=">Very Poor" required> &#128545;<br/>Very Poor</td>
                                                                        </div>
                                                                        </tr>

                                                              <tr><th>6. How would you rate the doctor/Dentist?</th>
                                                                        <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="rate_physician" id="rate_physician" value="Compassionate" required> &#128151;<br/> Compassionate</td>
                                                                                  <td>

                                                                                  <input type="radio" name="rate_physician" id="rate_physician" value="Attentive" required> &#127773;<br/> Attentive</td>
                                                                                  <td>

                                                                                  <input type="radio" name="rate_physician" id="rate_physician" value="Liberal" required> &#128542;<br/>Liberal</td>
                                                                                  <td>

                                                                                  <input type="radio" name="rate_physician" id="rate_physician" value="Indefferent" required> &#128543;<br/>Indefferent</td>
                                                                                  <td>

                                                                                  <input type="radio" name="rate_physician" id="physician_diagnosis" value=">Nonchalant" required> &#128545;<br/>Nonchalant</td>
                                                                        </div>
                                                                        </tr>

                                                   </thead>
                                         </table>
              </div>
                                         <hr/>
                               </div>

                               <div id="tin_picker" class="animate__animated animate__bounce">
                                         <div class="row">
                                  <label><h4><span style="color:#B29B35;">Pharmacy</span></h4></label>
                                         <table class="table">
                                                   <thead>

                                                              <tr>
                                                                        <th>1. What was the wait time to receive attention?</th>
                                                                        <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="pharmacy_wait_time" id="pharmacy_wait_time" value="0-15" required> &#128515;<br/> 0 - 15 minutes</td>
                                                                                  <td>

                                                                                  <input type="radio" name="pharmacy_wait_time" id="pharmacy_wait_time" value="15-30" required> &#127773;<br/>15 - 30 minutes</td>
                                                                                  <td>

                                                                                  <input type="radio" name="pharmacy_wait_time" id="pharmacy_wait_time" value="30-45" required> &#128542;<br/>30 - 45 minutes</td>
                                                                                  <td>

                                                                                  <input type="radio" name="pharmacy_wait_time" id="pharmacy_wait_time" value="45-60" required> &#128543;<br/>45 - 60 minutes</td>
                                                                                  <td>

                                                                                  <input type="radio" name="pharmacy_wait_time" id="pharmacy_wait_time" value=">60" required> &#128545;<br/>Above 60 minutes</td>
                                                                        </div>
                                                              </tr>

                                                              <tr>
                                                              <th>2. How satisfied are you with the quality of service received? </th>
                                                                        <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="phamarcy_satisfactions" id="phamarcy_satisfactions" value="Very Satisfied" required> &#128515;<br/> Very Satisfied</td>
                                                                                  <td>

                                                                                  <input type="radio" name="phamarcy_satisfactions" id="phamarcy_satisfactions" value=" Satisfied" required> &#127773;<br/> Satisfied</td>
                                                                                  <td>

                                                                                  <input type="radio" name="phamarcy_satisfactions" id="phamarcy_satisfactions" value="Average" required> &#128542;<br/>Average</td>
                                                                                  <td>

                                                                                  <input type="radio" name="phamarcy_satisfactions" id="phamarcy_satisfactions" value="Unsatisfied" required> &#128543;<br/>Unsatisfied</td>
                                                                                  <td>

                                                                                  <input type="radio" name="phamarcy_satisfactions" id="phamarcy_satisfactions" value=">Very Unsatisfied" required> &#128545;<br/>Very Unsatisfied</td>
                                                                        </div>
                                                              </tr>
                                                              <tr>
                                                              <th>3. Did you receive the prescription?</th>
                                                                        <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="prescription" id="prescription" value="Yes" required>&#10004;<br/> Yes </td>
                                                                                  <td>

                                                                                  <input type="radio" name="prescription" id="prescription" value="Partial" required>&#128542;<br/> Partial</td>

                                                                                  <td>

                                                                                  <input type="radio" name="reffered" id="reffered" value="No" required>&#10060;<br/> No</td>


                                                                        </div></tr>


                                                              <tr><th>4. How would you rate the hygiene/ambience level of the pharmacy?</th>
                                                                        <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="pharmacy_hygiene" id="pharmacy_hygiene" value="Very Good" required> &#128515;<br/> Very Good</td>
                                                                                  <td>

                                                                                  <input type="radio" name="pharmacy_hygiene" id="pharmacy_hygiene" value="Good" required> &#127773;<br/> Good</td>
                                                                                  <td>

                                                                                  <input type="radio" name="pharmacy_hygiene" id="pharmacy_hygiene" value="Average" required> &#128542;<br/>Average</td>
                                                                                  <td>

                                                                                  <input type="radio" name="pharmacy_hygiene" id="pharmacy_hygiene" value="Poor" required> &#128543;<br/>Poor</td>
                                                                                  <td>

                                                                                  <input type="radio" name="physician_diagnosis" id="physician_diagnosis" value=">Very Poor" required> &#128545;<br/>Very Poor</td>
                                                                        </div>
                                                                        </tr>



                                                              <tr><th>5. How would you rate the Pharmacist?</th>
                                                                        <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="rate_phamacist" id="rate_phamacist" value="Compassionate" required> &#128151;<br/> Compassionate</td>
                                                                                  <td>

                                                                                  <input type="radio" name="rate_phamacist" id="rate_phamacist" value="Attentive" required> &#127773;<br/> Attentive</td>
                                                                                  <td>

                                                                                  <input type="radio" name="rate_phamacist" id="rate_phamacist" value="Liberal" required> &#128542;<br/>Liberal</td>
                                                                                  <td>

                                                                                  <input type="radio" name="rate_phamacist" id="rate_phamacist" value="Indefferent" required> &#128543;<br/>Indefferent</td>
                                                                                  <td>

                                                                                  <input type="radio" name="rate_phamacist" id="rate_phamacist" value=">Nonchalant" required> &#128545;<br/>Nonchalant</td>
                                                                        </div>
                                                                        </tr>

                                                   </thead>
                                         </table>
              </div>
                                         <hr/>
                               </div>

                               <div id="nursing_care" class="animate__animated animate__fade">
                                         <div class="row">
                                  <label><h4><span style="color:#B29B35;">Nursing Care</span></h4></label>
                                         <table class="table">
                                                   <thead>

                                                              <tr>
                                                                        <th>1. What was the wait time to receive attention?</th>
                                                                        <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="pharmacy_wait_time" id="pharmacy_wait_time" value="0-15" required> &#128515;<br/> 0 - 15 minutes</td>
                                                                                  <td>

                                                                                  <input type="radio" name="pharmacy_wait_time" id="pharmacy_wait_time" value="15-30" required> &#127773;<br/>15 - 30 minutes</td>
                                                                                  <td>

                                                                                  <input type="radio" name="pharmacy_wait_time" id="pharmacy_wait_time" value="30-45" required> &#128542;<br/>30 - 45 minutes</td>
                                                                                  <td>

                                                                                  <input type="radio" name="pharmacy_wait_time" id="pharmacy_wait_time" value="45-60" required> &#128543;<br/>45 - 60 minutes</td>
                                                                                  <td>

                                                                                  <input type="radio" name="pharmacy_wait_time" id="pharmacy_wait_time" value=">60" required> &#128545;<br/>Above 60 minutes</td>
                                                                        </div>
                                                              </tr>

                                                              <tr>
                                                              <th>2. How satisfied are you with the quality of service received? </th>
                                                                        <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="phamarcy_satisfactions" id="phamarcy_satisfactions" value="Very Satisfied" required> &#128515;<br/> Very Satisfied</td>
                                                                                  <td>

                                                                                  <input type="radio" name="phamarcy_satisfactions" id="phamarcy_satisfactions" value=" Satisfied" required> &#127773;<br/> Satisfied</td>
                                                                                  <td>

                                                                                  <input type="radio" name="phamarcy_satisfactions" id="phamarcy_satisfactions" value="Average" required> &#128542;<br/>Average</td>
                                                                                  <td>

                                                                                  <input type="radio" name="phamarcy_satisfactions" id="phamarcy_satisfactions" value="Unsatisfied" required> &#128543;<br/>Unsatisfied</td>
                                                                                  <td>

                                                                                  <input type="radio" name="phamarcy_satisfactions" id="phamarcy_satisfactions" value=">Very Unsatisfied" required> &#128545;<br/>Very Unsatisfied</td>
                                                                        </div>
                                                              </tr>
                                                              <tr>
                                                              <th>3. Did you receive the prescription?</th>
                                                                        <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="prescription" id="prescription" value="Yes" required>&#10004;<br/> Yes </td>
                                                                                  <td>

                                                                                  <input type="radio" name="prescription" id="prescription" value="Partial" required>&#128542;<br/> Partial</td>

                                                                                  <td>

                                                                                  <input type="radio" name="reffered" id="reffered" value="No" required>&#10060;<br/> No</td>


                                                                        </div></tr>


                                                              <tr><th>4. How would you rate the hygiene/ambience level of the pharmacy?</th>
                                                                        <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="pharmacy_hygiene" id="pharmacy_hygiene" value="Very Good" required> &#128515;<br/> Very Good</td>
                                                                                  <td>

                                                                                  <input type="radio" name="pharmacy_hygiene" id="pharmacy_hygiene" value="Good" required> &#127773;<br/> Good</td>
                                                                                  <td>

                                                                                  <input type="radio" name="pharmacy_hygiene" id="pharmacy_hygiene" value="Average" required> &#128542;<br/>Average</td>
                                                                                  <td>

                                                                                  <input type="radio" name="pharmacy_hygiene" id="pharmacy_hygiene" value="Poor" required> &#128543;<br/>Poor</td>
                                                                                  <td>

                                                                                  <input type="radio" name="physician_diagnosis" id="physician_diagnosis" value=">Very Poor" required> &#128545;<br/>Very Poor</td>
                                                                        </div>
                                                                        </tr>



                                                              <tr><th>5. How would you rate the Pharmacist?</th>
                                                                        <div class="controls">
                                                                                  <td>
                                                                                  <input type="radio" name="rate_phamacist" id="rate_phamacist" value="Compassionate" required> &#128151;<br/> Compassionate</td>
                                                                                  <td>

                                                                                  <input type="radio" name="rate_phamacist" id="rate_phamacist" value="Attentive" required> &#127773;<br/> Attentive</td>
                                                                                  <td>

                                                                                  <input type="radio" name="rate_phamacist" id="rate_phamacist" value="Liberal" required> &#128542;<br/>Liberal</td>
                                                                                  <td>

                                                                                  <input type="radio" name="rate_phamacist" id="rate_phamacist" value="Indefferent" required> &#128543;<br/>Indefferent</td>
                                                                                  <td>

                                                                                  <input type="radio" name="rate_phamacist" id="rate_phamacist" value=">Nonchalant" required> &#128545;<br/>Nonchalant</td>
                                                                        </div>
                                                                        </tr>

                                                   </thead>
                                         </table>
              </div>
                                         <hr/>
                               </div>

                               <div id="vehicle_plate_no" class="animate__animated animate__bounce">
                                         <div class="row">
                                                   <label><h6><span style="color:#B29B35;">Vehicle Registration Number (Plate Number)  *</span></h6></label>
                                                   <div class="col-md-6 form-group">
                                                     <input type="text" name="plate_number" class="form-control" onmouseout="show_vio_details(this.value);" id="plate_number" placeholder="Vehicle Registration Number" required>
                                                   </div>

                                                   <div class="col-md-6 form-group">
                                                   <span id="vio_details" class="animate__animated animate__jello">

                                                   </span>
                                                   </div>

                                                   </div>
                                         <hr/>
                               </div>

                               <div id="vehicle_details" class="animate__animated animate__bounce">
                                         <div class="row">
                                                   <div class="col-md-6 form-group">
                                                   <label><h6><span style="color:#B29B35;">Vehicle Type  *</span></h6></label>
                                                     <select name="vehicle_type" class="form-control" id="vehicle_type" placeholder="Vehicle Type" required onchange="show_oem_details();">
                                                              <option value="">Select Vehicle Type</option>
                                                              <option value="">Bus</option>
                                                              <option value="">Mini Bus</option>
                                                              <option value="">Sedan (4 or 2 door Car)</option>
                                                              <option value="">Tricycle (Keke Napep)</option>
                                                     </select>
                                                   </div>
                                         </div>
                               </div>
                                         <hr/>
                               <div id="oem_details" class="animate__animated animate__bounce">
                                         <div class="row">
                                                   <div class="col-md-6 form-group">
                                                   <label><h6><span style="color:#B29B35;">Select State  *</span></h6></label>
                                                   <select name="state" class="chosen-select form-control" id="state" placeholder="State" required>
                                                              <option value="">--State?--</option>
                                                              <option>ABUJA FCT</option>
                                                             <option>ABIA</option>
                                                             <option>ADAMAWA</option>
                                                              <option>AKWA IBOM</option>
                                                             <option>ANAMBRA</option>
                                                             <option>BAUCHI</option>
                                                             <option>BAYELSA</option>
                                                             <option>BENUE</option>
                                                             <option>BORNO</option>
                                                              <option>CROSS RIVER</option>
                                                             <option>DELTA</option>
                                                             <option>EBONYI</option>
                                                             <option>EDO</option>
                                                             <option>EKITI</option>
                                                             <option>ENUGU</option>
                                                             <option>GOMBE</option>
                                                             <option>IMO</option>
                                                             <option>JIGAWA</option>
                                                             <option>KADUNA</option>
                                                             <option>KANO</option>
                                                             <option>KATSINA</option>
                                                             <option>KEBBI</option>
                                                             <option>KOGI</option>
                                                             <option>KWARA</option>
                                                             <option>LAGOS</option>
                                                             <option>NASSARAWA</option>
                                                             <option>NIGER</option>
                                                             <option>OGUN</option>
                                                             <option>ONDO</option>
                                                             <option>OSUN</option>
                                                             <option>OYO</option>
                                                             <option>PLATEAU</option>
                                                             <option>RIVERS</option>
                                                             <option>SOKOTO</option>
                                                             <option>TARABA</option>
                                                             <option>YOBE</option>
                                                             <option>ZAMFARA</option>
                                                     </select>
                                                   </div>

                                             <!--/div>
                                   <hr/>

                                   <div class="row"-->
                                                   <div class="col-md-6 form-group">
                                                   <label><h6><span style="color:#B29B35;">Select OEM  *</span></h6></label>
                                                     <select name="oem" class="form-control" id="oem" placeholder="OEM" required>
                                                              <option value="">Select OEM</option>
                                                              <option value="">OEM 1</option>
                                                              <option value="">OEM 2</option>
                                                              <option value="">OEM 3</option>
                                                              <option value="">OEM 4</option>
                                                     </select>
                                                   </div>

                                                   </div>
                                         <hr/>

                                         <div class="row">
                                                   <div class="col-md-6 form-group">
                                                   <label><h6><span style="color:#B29B35;">Select Schedule *</span></h6></label>
                                                     <select name="vehicle_yom" class="form-control" id="vehicle_yom" onchange="show_contact_details();" placeholder="Vehicle Year of Manufacture" required>
                                                              <option value="">Select Date-Time</option>
                                                              <option value="">9am 01/05/2021</option>
                                                              <option value="">10am 01/05/2021</option>
                                                              <option value="">1am 01/05/2021</option>
                                                     </select>
                                                   </div>

                                                    </div>

                                         <hr/>

                               </div>

                               <div id="contact_details" class="animate__animated animate__bounce">
                                         <div class="row">
                                                   <div class="col-md-6 form-group">
                                                   <label><h6><span style="color:#B29B35;">Phage *</span></h6></label>

                                                     <input type="text" name="phage" class="form-control" id="phage" placeholder="Your Phage" required>
                                                   </div>

                                                   <div class="col-md-6 form-group">
                                                      <label><h6><span style="color:#B29B35;">email *</span></h6></label>
                                                     <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                                   </div>
                                         </div>
                                         <hr/>
                                           <div class="row">
                                                   <div class="col-md-6 form-group">
                                                   <label><h6><span style="color:#B29B35;">Terms & Conditions</span></h6></label>

                                                              <div class="custom-control custom-checkbox mb-3">
                                                                <input type="checkbox" class="custom-control-input" id="terms" name="terms">
                                                                <label class="custom-control-label" for="terms"><a href="#">I accept the Terms & Conditions</a></label>
                                                              </div>

                                                   </div>


                                         </div>
                                         <hr/>

                                           <div class="text-center"><button type="submit">Submit</button></div>
                               </div>


            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

          </span>

    <script type="text/javascript" language=JavaScript>

        function nin_picker_() {

            myFunction();
            document.getElementById("nin_picker").style.display = "block";
            document.getElementById("tin_picker").style.display = "none";
            document.getElementById("nursing_care").style.display = "none";
            //document.getElementById("nin").required = true;
            //document.getElementById("tin").required = false;
            document.getElementById("tin").value = "";
            document.getElementById("plate_number").value = "";
            document.getElementById("vio_details").innerHTML = "";
            document.getElementById("tin_details").innerHTML = "";
            document.getElementById("nin_details").innerHTML = "";
        }

        function tin_picker_() {
            myFunction();
            document.getElementById("tin_picker").style.display = "block";
            document.getElementById("nin_picker").style.display = "none";
            document.getElementById("nursing_care").style.display = "none";
            //document.getElementById("nin").required = false;
            //document.getElementById("tin").required = true;
            document.getElementById("nin").value = "";
            document.getElementById("plate_number").value = "";
            document.getElementById("vio_details").innerHTML = "";
            document.getElementById("tin_details").innerHTML = "";
            document.getElementById("nin_details").innerHTML = "";
        }

        function nursing_care_() {
            myFunction();
            document.getElementById("nursing_care").style.display = "block";
            document.getElementById("tin_picker").style.display = "none";
            document.getElementById("nin_picker").style.display = "none";
            //document.getElementById("nin").required = false;
            //document.getElementById("tin").required = true;
            document.getElementById("nin").value = "";
            document.getElementById("plate_number").value = "";
            document.getElementById("vio_details").innerHTML = "";
            document.getElementById("tin_details").innerHTML = "";
            document.getElementById("nin_details").innerHTML = "";
        }

        function show_plate_no() {
            document.getElementById("vehicle_plate_no").style.display = "block";
        }

        function show_vehicle_details() {
            document.getElementById("vehicle_details").style.display = "block";
        }

        function show_oem_details() {
            document.getElementById("oem_details").style.display = "block";
        }

        function show_contact_details() {
            document.getElementById("contact_details").style.display = "block";
        }

        function show_nin_details(thisobjectid) {

            var nin = thisobjectid;

            if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            }
            else {// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function(){
                //alert(xmlhttp.readyState+"/"+xmlhttp.status);
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    //alert ("spn_vehicle["+b+"]");
                    document.getElementById("nin_details").innerHTML=xmlhttp.responseText;
                    //document.getElementById("quantity["+b+"]").value = "";
                }
            }
            xmlhttp.open("GET","ajax_get_nin?"+"nin_no="+nin,false);
            xmlhttp.send();

            var nin_call = document.getElementById("nin_call").value;
            //alert(nin_call);

            if (nin_call === 'yes'){
                document.getElementById("vehicle_plate_no").style.display = "block";
            }

            else {
                document.getElementById("vehicle_plate_no").style.display = "none";
            }
        }

        function show_tin_details(thisobjectid) {

            var tin = thisobjectid;

            if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            }
            else {// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function(){
                //alert(xmlhttp.readyState+"/"+xmlhttp.status);
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    //alert ("spn_vehicle["+b+"]");
                    document.getElementById("tin_details").innerHTML=xmlhttp.responseText;
                    //document.getElementById("quantity["+b+"]").value = "";
                }
            }
            xmlhttp.open("GET","ajax_get_tin?"+"tin_no="+tin,false);
            xmlhttp.send();

            var tin_call = document.getElementById("tin_call").value;
            //alert(nin_call);

            if (tin_call === 'yes'){
                document.getElementById("vehicle_plate_no").style.display = "block";
            }

            else {
                document.getElementById("vehicle_plate_no").style.display = "none";
            }
        }

        function show_vio_details(thisobjectid) {

            var vio = thisobjectid;
            //alert(vio);
            if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            }
            else {// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function(){
                //alert(xmlhttp.readyState+"/"+xmlhttp.status);
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    //alert ("spn_vehicle["+b+"]");
                    document.getElementById("vio_details").innerHTML=xmlhttp.responseText;
                    //document.getElementById("quantity["+b+"]").value = "";
                }
            }
            xmlhttp.open("GET","ajax_get_vio?"+"vio_no="+vio,false);
            xmlhttp.send();

            var vio_call = document.getElementById("vio_call").value;
            //alert(nin_call);

            if (vio_call === 'yes'){
                document.getElementById("vehicle_details").style.display = "block";
            }

            else {
                document.getElementById("vehicle_details").style.display = "none";
            }
        }




        function myFunction() {
            document.getElementById("show_onsubmit").style.display = "none";
            document.getElementById("nin_picker").style.display = "none";
            document.getElementById("tin_picker").style.display = "none";
            document.getElementById("nursing_care").style.display = "none";
            document.getElementById("vehicle_plate_no").style.display = "none";
            document.getElementById("vehicle_details").style.display = "none";
            document.getElementById("oem_details").style.display = "none";
            document.getElementById("contact_details").style.display = "none";
        }

        function showWait() {
            document.getElementById('hide_onsubmit').style['display']='none';
            document.getElementById('show_onsubmit').style['display']='block';
        }

    </script>
@stop

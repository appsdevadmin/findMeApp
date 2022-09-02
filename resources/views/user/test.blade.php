@extends('layouts.test_layout')
@section('content')

<section id="contact" class="contact" style="margin-top: 5%">
<div class="container"><!--style="background-image: url('{{ asset('auto_assets/img/hero-bg5.jpg') }}');"-->

    <div class="section-title" data-aos="fade-up">
       <h2 class="animate__animated animate__bounceInDown">Tell us about your hospital visit<br/></h2>
       <h5>This will help us improve your next experience!</h5>
       <h5><sub>All fields marked with (*) are compulsary.</sub></h5>
    </div>

    <div class="row mt-5 justify-content-center" data-aos="fade-up">
        <div class="col-lg-10">
            <form action="#" method="post" role="form" id="reg_form" class="php-email-form">

              	<div class="row">
                	<label><h4><span style="color:#B29B35;">Basic Information</span></h4></label>
                	<hr>
	            </div>

				<div class="row form-question">
	            	<div class="col-md-4">
	            		<span class="font-question-title">1. Age Bracket</span>
	            	</div>
	            	<div class="col-md-8">
	            		<div class="radio-label-vertical-wrapper">
						    <div class="form-group">
						      <label class="radio-label-vertical">
						        <input type="radio" name="radio-0" value="0" required>0 - 5 years
						      </label>
						      <label class="radio-label-vertical">
						        <input type="radio" name="radio-1" value="1" required>6 - 10 years
						      </label>
						      <label class="radio-label-vertical">
						        <input type="radio" name="radio-0" value="0" required>11 - 18 years
						      </label>
						      <label class="radio-label-vertical">
						        <input type="radio" name="radio-1" value="1" required>19 - 59 years
						      </label>
						      <label class="radio-label-vertical">
						        <input type="radio" name="radio-1" value="1" required>Above 60 years
						      </label>
						    </div>
						</div>
	            	</div>
		            </div>

		            <div class="row form-question">
		            	<div class="col-md-4">
		            		<span class="font-question-title">2. Gender</span>
		            	</div>
		            	<div class="col-md-8">
		            		<div class="radio-label-vertical-wrapper">
							    <div class="form-group">
							      <label class="radio-label-vertical">
							        <input type="radio" name="radio-0" value="0" required>Male
							      </label>
							      <label class="radio-label-vertical">
							        <input type="radio" name="radio-1" value="1" required>Female
							      </label>
							    </div>
							</div>
		            	</div>
		            </div>

		            <div class="row form-question">
		            	<div class="col-md-4">
		            		<span class="font-question-title">3. Service (Employment) Status</span>
		            	</div>
		            	<div class="col-md-8">
		            		<div class="radio-label-vertical-wrapper">
							    <div class="form-group">
							      <label class="radio-label-vertical">
							        <input type="radio" name="radio-0" value="0" required>Staff
							      </label>
							      <label class="radio-label-vertical">
							        <input type="radio" name="radio-1" value="1" required>Retiree
							      </label>
							      <label class="radio-label-vertical">
							        <input type="radio" name="radio-0" value="0" required>Dependant
							      </label>
							      <label class="radio-label-vertical">
							        <input type="radio" name="radio-1" value="1" required>Third Party
							      </label>
							      <label class="radio-label-vertical">
							        <input type="radio" name="radio-1" value="1" required>Other
							      </label>
							    </div>
							</div>
		            	</div>
		            </div>

	            <br>
				<div class="row">
                                 <label><h4><span style="color:#B29B35;">Select Unit *</span></h4></label>


                                                   <div class="btn-group mr-2" role="group" aria-label="First group">
                                                     <input type="checkbox" class="btn-check" name="registration_type" id="option1" autocomplete="off" onclick="nin_picker_();" />
                                                     <label class="btn btn-outline-success" for="option1"><div class="icon"><i class="bx bx-user"></i></div> Physician/Dentist</label>
                                                   &nbsp;&nbsp;
                                                     <input type="checkbox" class="btn-check" name="registration_type" id="option2" autocomplete="off" onclick="tin_picker_();"/>
                                                     <label class="btn btn-outline-warning" for="option2"><div class="icon"><i class="bx bx-world 2x"></i></div> Pharmacy</label>&nbsp;&nbsp;
                                                     <input type="checkbox" class="btn-check" name="registration_type" id="option3" autocomplete="off" onclick="tin_picker_();"/>
                                                     <label class="btn btn-outline-info" for="option3"><div class="icon"><i class="bx bx-world 2x"></i></div> Nursing Care</label>&nbsp;&nbsp;
                                                     <input type="checkbox" class="btn-check" name="registration_type" id="option4" autocomplete="off" onclick="nursing_care_();"/>
                                                     <label class="btn btn-outline-primary" for="option4"><div class="icon"><i class="bx bx-world 2x"></i></div> Laboratory Services</label>&nbsp;&nbsp;
                                                   </div>

                                                   <div class="btn-group mr-2" role="group" aria-label="Second group">
                                                     <input type="checkbox" class="btn-check" name="registration_type" id="option5" autocomplete="off" onclick="tin_picker_();"/>
                                                     <label class="btn btn-outline-info" for="option5"><div class="icon"><i class="bx bx-world 2x"></i></div> Maternity & <br/>Ante-Natal Care</label>&nbsp;&nbsp;
                                                     <input type="checkbox" class="btn-check" name="registration_type" id="option6" autocomplete="off" onclick="tin_picker_();"/>
                                                     <label class="btn btn-outline-primary" for="option6"><div class="icon"><i class="bx bx-world 2x"></i></div> Imaging</label>&nbsp;&nbsp;
                                                     <input type="checkbox" class="btn-check" name="registration_type" id="option7" autocomplete="off" onclick="tin_picker_();"/>
                                                     <label class="btn btn-outline-success" for="option7"><div class="icon"><i class="bx bx-world 2x"></i></div> Front Desk</label>&nbsp;&nbsp;
                                                     <input type="checkbox" class="btn-check" name="registration_type" id="option8" autocomplete="off" onclick="tin_picker_();"/>
                                                     <label class="btn btn-outline-warning" for="option8"><div class="icon"><i class="bx bx-world 2x"></i></div> General Hospital<br/>Administration</label>
                                                   </div>

                               </div>

<div class="row container">
	
		            <form class="rating">
  <h3 class="rating__title">Physician/Dentist
    <div class="rating__list">How helpful was this?
      <div class="rating__item">
        <input class="rating__input rating--1" id="rating-1-2" type="radio" value="1" name="rating">
        <label class="rating__label rating--1" for="rating-1-2"><i class="em em-angry"></i></label>
        <p class="rating__text">Very Poor</p>
      </div>
      <div class="rating__item">
        <input class="rating__input rating--2" id="rating-2-2" type="radio" value="2" name="rating">
        <label class="rating__label rating--2" for="rating-2-2"><i class="em em-disappointed"></i></label>
        <p class="rating__text">Poor</p>
      </div>
      <div class="rating__item">
        <input class="rating__input rating--3" id="rating-3-2" type="radio" value="3" name="rating">
        <label class="rating__label rating--3" for="rating-3-2"><i class="em em-expressionless"></i></label>
        <p class="rating__text">Average</p>
      </div>
      <div class="rating__item">
        <input class="rating__input rating--4" id="rating-4-2" type="radio" value="4" name="rating">
        <label class="rating__label rating--4" for="rating-4-2"><i class="em em-grinning"></i></label>
        <p class="rating__text">Good</p>
      </div>
      <div class="rating__item">
        <input class="rating__input rating--5" id="rating-5-2" type="radio" value="5" name="rating">
        <label class="rating__label rating--5" for="rating-5-2"><i class="em em-star-struck"></i></label>
        <p class="rating__text">Very Good</p>
      </div>
    </div>
  </h3>
</form>
</div>
	        </form>
	    </div>
	</div>
</div>
</section>
@endsection
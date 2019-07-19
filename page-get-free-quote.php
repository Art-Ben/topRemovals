<?php
get_header('padding');
?>

<div class="getFreeQuote">
    <div class="container">
        <div class="topHeaders">
            <span class="topHeaders_top text--center">
                <?php the_field('freeQuote_subtitle','settings'); ?>
            </span>
            <h1 class="topHeaders_bottom captions captions_h2 text--center">
                <?php the_field('freeQuote_title','settings'); ?>
            </h1>
        </div>
        <div class="cities open">
            <div class="topHeaders">
                <span class="topHeaders_top text--center">
                    Please select one of the options to proceed to the next step.
                </span>
                <h2 class="topHeaders_bottom captions captions_h2 text--center">
                    States
                </h2>
            </div>
            <div class="citiesForm">
                <select class="citiesSelect">
                    <option value="">Choose State</option>
                    <option value="admin@topremovals.com.au">VIC</option>
                    <option value="admin@topremovals.com.au">NSW</option>
                    <option value="admin@topremovals.com.au">QLD</option>
                    <option value="admin@topremovals.com.au">WA</option>
                    <option value="admin@topremovals.com.au">SA</option>
                    <option value="admin@topremovals.com.au">ACT</option>
                    <option value="admin@topremovals.com.au">NT</option>
                    <option value="admin@topremovals.com.au">TAS</option>
                </select>
            </div>
        </div>

        <div class="getFreeQuote--checkout">
            <div class="container">
                <div class="topHeaders">
                    <span class="topHeaders_top text--center">
                        <?php the_field('freeQuote_subtitle','settings'); ?>
                    </span>
                    <h1 class="topHeaders_bottom captions captions_h2 text--center">
                        <?php the_field('freeQuote_title','settings'); ?>
                    </h1>
                </div>
                <div class="checkoutContainer">
                    <a href="javascript:void(0);" class="back"></a>
                    <div class="mapContDestination"></div>
                    <div class="checkoutInfo">
                        <div class="checkoutInfoTop">
                            <div class="titl">
                                Review your details:
                            </div>
                            <div class="results">
                                <div class="column">
                                    <div class="result" id="resultWhat">I need to move a few things </div>
                                    <div class="result" id="resultFrom">From Docklens, VIC 3008</div>
                                    <div class="result" id="resultFromStairs">Building with stairs</div>
                                </div>
                                <div class="column">
                                    <div class="result" id="resultTo">To Footskrey, VIC 3011</div>
                                    <div class="result" id="resultToStairs">Ground floor</div>
                                    <div class="result" id="resultDate">On 4 May, 2019. Afternoon</div>
                                </div>
                            </div>
                        </div>
                        <div class="checkoutInfoBottom">
                            <div class="titl">
                                Contact details
                            </div>
                            <div class="form">
                                <?php echo do_shortcode('[contact-form-7 id="353" title="Submission get free quote"]')?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="getFreeQuote--content">
            <div class="info">
                <span class="titl">
                    You can move everything in just a few steps
                </span>
                <div class="stepsList">
                    <div class="stepsList__titl">
                        <span class="st st1">Moving from:</span>
                        <span class="st st2 hdn">Your access:</span>
                        <span class="st st3 hdn">Moving to:</span>
                        <span class="st st4 hdn">Your access:</span>
                        <span class="st st5 hdn">Moving date: </span>
                    </div>
                    <div class="step" id="whatStep">
                        <span class="inner">I need to move a few things</span>
                    </div>
                    <div class="step hdn" id="fromStep">
                        <span class="inner">From Docklens, VIC 3008</span>
                    </div>
                    <div class="step hdn" id="stairsFrom">
                        <span class="inner">Building with stairs</span>
                    </div>
                    <div class="step hdn" id="toStep">
                        <span class="inner">To Footskrey, VIC 3011</span>
                    </div>
                    <div class="step hdn" id="stairsTo">
                        <span class="inner">Ground floor</span>
                    </div>
                </div>
            </div>

            <div class="getFreeQuote--form">
                <div class="form-slide" id="fromSlide">
                    <div class="inputLine">
                        <a href="javascript:void(0);" class="back" rel="nofollow"></a>
                        <div class="inputGroup">
                            <input placeholder="Write an address or suburb" type="text" class="inpt from" id="fromAutocomplete">
                        </div>
                        <a href="javascript:void(0);" class="confirm" rel="nofollow"></a>
                    </div>
                </div>
                <div class="form-slide" id="stairsFromSlide">
                    <a href="javascript:void(0);" class="back" rel="nofollow"></a>
                    <div class="radioBtnLine">
                        <div class="btns">
                            <div class="group">
                                <input id="id1" type="radio" name="fromStairs">
                                <label for="id1">Ground floor</label>
                            </div>
                            <div class="group">
                                <input id="id2" type="radio" name="fromStairs">
                                <label for="id2">Building with elevator</label>
                            </div>
                            <div class="group">
                                <input id="id3" type="radio" name="fromStairs">
                                <label for="id3">Building with stairs</label>
                            </div>
                        </div>

                        <span class="tlt">
                            *We do not charge any extra for using stairs or elevator
                        </span>
                    </div>
                </div>
                <div class="form-slide" id="toSlide">
                    <div class="inputLine">
                        <a href="javascipr:void(0);" class="back" rel="nofollow"></a>
                        <div class="inputGroup">
                            <input placeholder="Write an address or suburb" type="text" class="inpt to" id="toAutocomplete">
                        </div>
                        <a href="javascript:void(0);" class="confirm" rel="nofollow"></a>
                    </div>
                </div>
                <div class="form-slide" id="stairsToSlide">
                    <a href="javascript:void(0);" class="back" rel="nofollow"></a>
                    <div class="radioBtnLine">
                        <div class="btns">
                            <div class="group">
                                <input id="id4" type="radio" name="toStairs">
                                <label for="id4">Ground floor</label>
                            </div>
                            <div class="group">
                                <input id="id5" type="radio" name="toStairs">
                                <label for="id5">Building with elevator</label>
                            </div>
                            <div class="group">
                                <input id="id6" type="radio" name="toStairs">
                                <label for="id6">Building with stairs</label>
                            </div>
                        </div>

                        <span class="tlt">
                            *We do not charge any extra for using stairs or elevator
                        </span>
                    </div>
                </div>
                <div class="form-slide" id="dateSlide">
                    <a href="javascript:void(0);" class="back" rel="nofollow"></a>
                    <div class="datepickerForm">
                        <div class="datepickerFormPicker">
                            <span class="titl">* No surcharge for weekend bookings or public holiday</span>
                            <div class="picker">
                                <div class="pickerCalender"></div>
                                <div class="btnLine">
                                    <a href="javascript:void(0);" rel="nofollow" class="submitFreeQuoteForm">
                                        Next
                                    </a>
                                </div>
                            </div>
                            <div class="dayTime">
                                <div class="dayTime__item">
                                    <input type="radio" id="dayTime1" value="Morning" name="dayTime">
                                    <label for="dayTime1">Morning</label>
                                </div>
                                <div class="dayTime__item">
                                    <input type="radio" id="dayTime2" value="Afternoon" name="dayTime">
                                    <label for="dayTime2">Afternoon</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="getFreeQuote--form_nav">
                <div class="getFreeQuote--form_nav-inner">
                    <div class="line">
                        <img src="<?php echo get_template_directory_uri();?>/images/car.svg" alt="car" class="marker">
                    </div>
                    <div class="navItems">
                        <span class="item ">What</span>
                        <span class="item active">Where</span>
                        <span class="item ">When</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php get_footer('padding');?>

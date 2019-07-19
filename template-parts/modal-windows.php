<?php 
/* 
    Modal windows templates 
*/
?>
<!-- qucik contact modal window -->
<div class="modal-window hdn" data-modal="freeCall">
    <div class="modal-content contact">
        <a href="javascript:void(0);" class="closeModalWindow"></a>
        <div class="modal-content__inner scrollbar-inner">
            <div class="contactForm">
                <div class="titl">
                    Get a Quote
                </div>
                <div class="form">
                    <?php echo do_shortcode('[contact-form-7 id="92" title="get aqoute"]');?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end -->

<!-- success Send modal window -->
<div class="modal-window hdn" data-modal="success">
    <div class="modal-content success">
        <a href="javascript:void(0);" class="closeModalWindow"></a>
        <div class="modal-content__inner scrollbar-inner">
            <div class="successBlock">
                <div class="carBlock"></div>
                <div class="textBlock">
                    <span class="big">Thank you for your inquiry!</span>
                    <span class="small">We will contact you shortly to discuss all details </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end -->

<!-- success Send modal window -->
<div class="modal-window hdn" data-modal="successFull">
    <div class="modal-content success">
        <a href="javascript:void(0);" class="closeModalWindow"></a>
        <div class="modal-content__inner scrollbar-inner">
            <div class="successBlock newFull">
                <div class="carBlock"></div>
                <div class="textBlock">
                    <span class="big">Thank you for your inquiry!</span>
                    <span class="small">We will contact you shortly to discuss all details </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end -->


<!-- cubic meter validation error -->
<div class="modal-window hdn" data-modal="cubicError">
    <div class="modal-content contact">
        <a href="javascript:void(0);" class="closeModalWindow"></a>
        <div class="modal-content__inner scrollbar-inner">
            <div class="basicTxt">
                <div class="cpt h2">
                    Ooops, an error occurred 
                </div>
                <div class="preCaptions">
                    To calculate the number of cubic meters please select at least one parameter or fill in the field in the tab: "Other"
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end -->

<!-- quick quote single sity validation error -->
<div class="modal-window hdn" data-modal="quickQuoteErr">
    <div class="modal-content contact">
        <a href="javascript:void(0);" class="closeModalWindow"></a>
        <div class="modal-content__inner scrollbar-inner">
            <div class="basicTxt">
                <div class="cpt h2">
                    Ooops, an error occurred 
                </div>
                <div class="preCaptions">
                    Some error
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end -->


<!-- free quote page validation error -->
<div class="modal-window hdn" data-modal="freeQuoteErr">
    <div class="modal-content contact">
        <a href="javascript:void(0);" class="closeModalWindow"></a>
        <div class="modal-content__inner scrollbar-inner">
            <div class="basicTxt">
                <div class="cpt h2">
                    Ooops, an error occurred 
                </div>
                <div class="preCaptions">
                    Please choose a date and part of the day when you need to transfer things.
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end -->


<!-- cubic meter success -->
<div class="modal-window hdn" data-modal="cubicSucces">
    <div class="modal-content cubicSuccess">
        <a href="javascript:void(0);" class="closeModalWindow"></a>
        <div class="modal-content__inner scrollbar-inner">
            <div class="cubicSuccess">
                <div class="cpt">
                    Based on the information provided:
                </div>
                <div class="countLine">
                    <div class="txt">
                        Estimated volume:
                    </div>
                    <div class="count">
                        <span class="num">0</span>
                         cubic meter
                    </div>
                </div>
                <div class="bscTxt">
                    One of our representative  will contact you shortly
                </div>
                <div class="imgLine">
                    <img class="img" src="<?php echo get_template_directory_uri();?>/images/car.svg" alt="car icon">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end -->

<!-- qucik contact modal window -->
<div class="modal-window hdn" data-modal="cubicForm">
    <div class="modal-content contact">
        <a href="javascript:void(0);" class="closeModalWindow"></a>
        <div class="modal-content__inner scrollbar-inner">
            <div class="contactForm">
                <div class="titl nonMrg">
                    Your contacts 
                </div>
                <div class="subTitle">
                    to get estimation of your move size immediately
                </div>
                <div class="form">
                    <?php echo do_shortcode('[contact-form-7 id="294" title="cubic Form"]');?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end -->


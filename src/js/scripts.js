import './../js/bodyScrollLock';
/*- basic scripts -*/
$(function () {

    jQuery.fn.exists = function () {
        return this.length > 0;
    }

    function toggleMenu(MenuCont, MenuToggleLink, HiddenMenuCont, clasToToggle) {
        $(MenuCont + ' ' + MenuToggleLink).click(function (e) {
            e.preventDefault();
            if (!$(this).hasClass(clasToToggle)) {
                $(this).addClass(clasToToggle);
                $(MenuCont + ' ' + HiddenMenuCont).addClass(clasToToggle);
            } else {
                $(this).removeClass(clasToToggle);
                $(MenuCont + ' ' + HiddenMenuCont).removeClass(clasToToggle);
            }
        });
    }

    toggleMenu('.header', '.menu__link', '.menu__hiddenList_mobile', 'open');


    function parallaxInit(elem, options) {
        $(elem).paroller(options);
    }

    function initFlickity(elem, options) {
        return $(elem).flickity(options);
    }

    if ($('.primarySize__slider--slides').exists() && $('.primarySize__slider--nav').exists()) {
        var primarySizeSlider = initFlickity('.primarySize__slider--slides', {
            prevNextButtons: false,
            dots: false,
            contain: false,
            wrapAround: false,
            draggable: false
        });
        var primarySizeNav = initFlickity('.primarySize__slider--nav', {
            prevNextButtons: false,
            dots: false,
            contain: true,
            wrapAround: false,
            asNavFor: '.primarySize__slider--slides',
            sync: '.primarySize__slider--slides'
        });
    }


    if ($('.primaryWhy__slider').exists()) {
        var whySlider = initFlickity('.primaryWhy__slider', {
            wrapAround: false,
            prevNextButtons: true,
            dots: true,
            contain: 'center',
            autoPlay: 5000,
            pauseAutoPlayOnHover:false
        });
        whySlider.on('staticClick.flickity', function (event, pointer, cellElement, cellIndex) {
            if (typeof cellIndex == 'number') {
                whySlider.flickity('select', cellIndex);
            }
        });

        $(window).resize(function () {
            whySlider.flickity('resize');
        })
    }



    if ($('.primaryTestimonials__items').exists() || $('.primaryTestimonials__items').exists()) {
        var testimonialsSlider = initFlickity('.primaryTestimonials__items', {
            wrapAround: false,
            prevNextButtons: true,
            dots: false,
            contain: 'center'
        });

        var quoteSlider = initFlickity('.primaryQuote__order--items', {
            wrapAround: false,
            dots: false,
            contain: false,
            percentPosition: false,
            watchCSS: true
        });

        if ($(window).innerWidth() < 560) {
            $('.primaryQuote__order--items').addClass('is-slider');
            setTimeout(function () {
                quoteSlider.flickity('resize');
            }, 100);
            setTimeout(function () {
                testimonialsSlider.flickity('resize');
            }, 100);
        } else {
            $('.primaryQuote__order--items').removeClass('is-slider');
        }

        $(window).resize(function () {
            if ($(window).innerWidth() < 560) {
                $('.primaryQuote__order--items').addClass('is-slider');
                setTimeout(function () {
                    quoteSlider.flickity('resize');
                }, 100);
                setTimeout(function () {
                    testimonialsSlider.flickity('resize');
                }, 100);
            } else {
                $('.primaryQuote__order--items').removeClass('is-slider');
            }
        });
    }


    function sliderNavTabletFlickity(sectionName, slider, selectorNav, arrowPrev, arrowNext) {
        $(sectionName + ' ' + selectorNav + ' ' + arrowPrev).click(function (e) {
            e.preventDefault();
            $(sectionName + ' ' + slider).flickity('previous');
        });
        $(sectionName + ' ' + selectorNav + ' ' + arrowNext).click(function (e) {
            e.preventDefault();
            $(sectionName + ' ' + slider).flickity('next');
        });
    }

    sliderNavTabletFlickity('.primarySize', '.primarySize__slider--nav', '.sliderNav', '.prev', '.next');
    sliderNavTabletFlickity('.primaryTestimonials', '.primaryTestimonials__items', '.sliderNav', '.prev', '.next');


    /*--- custom scrollbar ---*/
    function cstScroll(sel, options) {
        $(sel).scrollbar(options);
    }

    cstScroll('.singleService__content--item .txt', {});
    //    cstScroll('.modal-window .modal-content', {});
    cstScroll('.getFreeQuote .getFreeQuote--checkout', {});
    /*--- end ---*/


    /*-- footer toggler button (short footer) --*/
    function toggleFooter(sel, link, linkClass, blockSel, blockClass) {
        $(sel + ' ' + link).click(function (e) {
            e.preventDefault();
            if (!$(this).hasClass(linkClass)) {
                $(this).addClass(linkClass);
                $(sel + ' ' + blockSel).removeClass(blockClass);
                $("html, body").animate({
                    scrollTop: $(document).height()
                }, 1000);
            } else {
                $(this).removeClass(linkClass);
                $(sel + ' ' + blockSel).addClass(blockClass);
                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
            }
        })
    }

    toggleFooter('.footer', '.footer__toggler', 'open', '.footer_top, .footer_bottom', 'hide');

    /*-- end--*/

    function abslImages(sel, mxHeight, postsCont, clsToToggle) {
        if ($(postsCont).innerHeight() > mxHeight) {
            $(postsCont + ' ' + sel).removeClass(clsToToggle);
            parallaxInit(sel, {
                factor: 0.4,
                factorXs: 0.1, //  <576px
                factorSm: 0.2, //  <=768px
                factorMd: 0.35, //  <=1024px
                factorLg: 0.4, //  <=1200px
                type: 'foreground',
                direction: 'vertical',
                transition: 'transform .3s linear'
            });
        } else {
            $(postsCont + ' ' + sel).addClass(clsToToggle);
        }
    }
    /*-- post boxes --*/
    //    abslImages('.imgAbsl.img1', '250', '.blog__single .content', 'hide');
    //    abslImages('.imgAbsl.img2', '800', '.blog__single .content', 'hide');
    //    abslImages('.imgAbsl.img3', '500', '.blog__single .content', 'hide');
    /*- end -*/

    /*- simplePage boxes -*/
    //    abslImages('.imgAbsl.img1', '350', '.simplePage .simplePage__content', 'hide');
    //    abslImages('.imgAbsl.img2', '550', '.simplePage .simplePage__content', 'hide');
    //    abslImages('.imgAbsl.img3', '800', '.simplePage .simplePage__content', 'hide');
    //    abslImages('.imgAbsl.img4', '2000', '.simplePage .simplePage__content', 'hide');

    /*- about-us page boxes-*/
    //    abslImages('.imgAbsl.img1About', '350', '.simplePage .simplePage__content', 'hide');
    //    abslImages('.imgAbsl.img2About', '700', '.simplePage .simplePage__content', 'hide');
    //    abslImages('.imgAbsl.img3About', '1500', '.simplePage .simplePage__content', 'hide');
    //    abslImages('.imgAbsl.img4About', '1700', '.simplePage .simplePage__content', 'hide');
    //    abslImages('.imgAbsl.img5About', '2100', '.simplePage .simplePage__content', 'hide');

    if ($('.inventoryCalc__places--slider').exists() && $('.inventoryCalc__places--items').exists()) {
        var cubometrNavSlider = initFlickity('.inventoryCalc__places--slider', {
            pageDots: false,
            contain: 'left',
            wrapAround: false,
            draggable: true,
            asNavFor: '.inventoryCalc__places--items',
            adaptiveHeight: true,
            sync: '.inventoryCalc__places--items'
        });

        setTimeout(function () {
            cubometrNavSlider.flickity('resize');
        }, 100);


        var cubometrSliderForm = initFlickity('.inventoryCalc__places--items', {
            pageDots: false,
            contain: 'left',
            wrapAround: false,
            draggable: false,
            prevNextButtons: false,
            adaptiveHeight: true
        });

        setTimeout(function () {
            cubometrSliderForm.flickity('resize');
        }, 100);

        sliderNavTabletFlickity('.inventoryCalc__content', '.inventoryCalc__places--slider', '.sliderNav', '.prev', '.next');

        $(window).resize(function () {
            if ($(window).innerWidth() < 992) {
                cubometrNavSlider.flickity('resize');
                cubometrSliderForm.flickity('resize');
            } else if ($(window).innerWidth() < 560) {
                cubometrNavSlider.flickity('resize');
                cubometrSliderForm.flickity('resize');
            }
        });

        if ($(window).innerWidth() < 992) {
            cubometrNavSlider.flickity('resize');
            cubometrSliderForm.flickity('resize');
        } else if ($(window).innerWidth() < 560) {
            cubometrNavSlider.flickity('resize');
            cubometrSliderForm.flickity('resize');
        }
    }




    function cubometrMarkerMove(markerCont, markerSel, navSel, linkSel, addLinkSel) {
        var posLeft;
        var step = 100 / $(navSel + ' ' + addLinkSel).length;
        posLeft = step * $(navSel + ' ' + addLinkSel).index(linkSel) + '%';
        $(markerCont + ' ' + markerSel).css('left', posLeft);

        if (markerCont === undefined || markerSel === undefined || navSel === undefined || linkSel === undefined) {
            return false;
        }
    }


    $('.inventoryCalc').on('click', '.inventoryCalc__places--slider .slide', function () {
        cubometrMarkerMove('.inventoryCalc__places--nav', '.marker', '.inventoryCalc__places--slider', $(this), '.slide');
    });


    /*- cubometr page -*/
    //    abslImages('.imgAbsl.img1', '100', '.inventoryCalc', 'hide');
    //    abslImages('.imgAbsl.img2', '400', '.inventoryCalc', 'hide');

    /*- cubometr calculations functions  and  cubometr contains list toogle function --*/

    function cubometrShowAllContain(btnSel, clsToAdd, prntCont, listCont) {
        $(prntCont + ' ' + btnSel).click(function (e) {
            e.preventDefault();
            if ($(this).hasClass(clsToAdd)) {
                $(this).text('Hide');
                $(this).parents(prntCont).removeClass(clsToAdd);
                $(this).removeClass(clsToAdd);
                $(listCont).slideDown(500);
            } else {
                $(this).text('See all');
                $(this).parents(prntCont).addClass(clsToAdd);
                $(this).addClass(clsToAdd);
                $(listCont).slideUp(500);
            }
        })
    }

    cubometrShowAllContain('.moreList', 'open', '.summary_buttons', '.summary__list');


    function hideAllBtn(prnt, sel, seList, btn, clsBtn, btnPrnt) {
        if (sumCubometr('.inventoryCalc__places--items .calcLine') == 0 && $('.inventoryCalc__form .inventoryCalc__places--items .cstArea').val() == '') {
            $(prnt + ' ' + sel).fadeOut(500);
            $(prnt + ' ' + seList).slideUp(500);
            $(prnt + ' ' + btn).addClass(clsBtn);
            $(prnt + ' ' + btnPrnt).addClass(clsBtn);
            $(prnt + ' ' + btn).text('See all');
        } else {
            $(prnt + ' ' + sel).fadeIn(500);
        }
    }
    hideAllBtn('.inventoryCalc__form--total', '.moreList', '.summary__list', '.moreList', 'open', '.summary_buttons');


    /*- plus function -*/
    function cubometrPlus(event) {
        var self = $(this);
        var prntName = self.parents(event.data.prnCn).children(event.data.textElem).text();

        var slideName = self.parents('.slide').data('slide');
        var thisItemName = self.parents('.calcLine__btns').siblings('.calcLine__text').text();
        thisItemName = thisItemName.replace(/\s+/g, '');
        var slideToShow = '.inventoryCalc__form--total .summary__list--item[data-slideShow="' + slideName + '"]';
        var lineToshow = '.inventoryCalc__form--total .summary__list--item .calcLine[data-lineshow="' + thisItemName + '"]';

        var prnCount = self.parents(event.data.prnCn).prop('dataset').scope;
        var count = parseFloat($('.inventoryCalc__form--total .summary_buttons .count').text());
        ++prnCount;
        self.parents(event.data.prnCn).prop('dataset').scope = prnCount;
        self.siblings(event.data.countElem).text(prnCount);

        hideAllBtn('.inventoryCalc__form--total', '.moreList', '.summary__list', '.moreList', 'open', '.summary_buttons');

        $(lineToshow + ' ' + '.scope').text(prnCount);

        if (prnCount == 1) {
            ++count;
            $(slideToShow).removeClass('hide');
            $(lineToshow).removeClass('hide');

        }
        $('.inventoryCalc__form--total .summary_buttons .count').text(count);


    }

    $('.inventoryCalc__places--items .slide .column .calcLine__btns .btn.plus').on('click', {
        prnCn: '.inventoryCalc__places--items .calcLine',
        textElem: '.calcLine__text',
        countElem: '.scope'
    }, cubometrPlus);


    /*- minus function -*/
    function cubometrMinus(event) {

        var self = $(this);
        var prntName = self.parents(event.data.prnCn).children(event.data.textElem).text();
        var slideName = self.parents('.slide').data('slide');
        var prnCount = self.parents(event.data.prnCn).prop('dataset').scope;


        var slideName = self.parents('.slide').data('slide');
        var thisItemName = self.parents('.calcLine__btns').siblings('.calcLine__text').text();
        thisItemName = thisItemName.replace(/\s+/g, '');
        var slideToShow = '.inventoryCalc__form--total .summary__list--item[data-slideShow="' + slideName + '"]';
        var lineToshow = '.inventoryCalc__form--total .summary__list--item .calcLine[data-lineshow="' + thisItemName + '"]';

        if (prnCount == 0) {

            return false;
        } else {
            var count = parseFloat($('.inventoryCalc__form--total .summary_buttons .count').text());
            --prnCount;
            self.parents(event.data.prnCn).prop('dataset').scope = prnCount;
            self.siblings(event.data.countElem).text(prnCount);
            $(lineToshow + ' ' + '.scope').text(prnCount);
            if (self.parents(event.data.prnCn).prop('dataset').scope <= 0) {
                prnCount = 0
                self.parents(event.data.prnCn).prop('dataset').scope = prnCount;
                self.siblings(event.data.countElem).text(prnCount);
                $(lineToshow).addClass('hide');
                if ($(slideToShow + ' .calcLine:not(.hide)').length == 0) {
                    $(slideToShow).addClass('hide');

                }
            }

            hideAllBtn('.inventoryCalc__form--total', '.moreList', '.summary__list', '.moreList', 'open', '.summary_buttons');

            if (prnCount < 1) {
                --count;
                if (count < 0) {
                    count = 0;
                }
            }
            $('.inventoryCalc__form--total .summary_buttons .count').text(count);
        }
    }


    $('.inventoryCalc__places--items .slide .column .calcLine__btns .btn.minus').on('click', {
        prnCn: '.calcLine',
        textElem: '.calcLine__text',
        countElem: '.scope'
    }, cubometrMinus);



    /*- get sum of cubometr -*/
    function sumCubometr(elem) {
        var sum = 0;
        $(elem).each(function (i, n) {
            var ct = parseFloat($(n).prop('dataset').scope);
            var coef = parseFloat($(n).prop('dataset').coef);
            var dob = ct * coef;
            sum += dob;
        });
        return sum.toFixed(1);
    }

    /*- set a sum cubometr to pop up -*/
    var elem = $('.modal-window .cubicSuccess .count .num');

    /*- end -*/

    /*- valid a form and shows poups -*/
    $('.inventoryCalc__form--total .button').click(function () {
        if (sumCubometr('.inventoryCalc__places--items .calcLine') == 0 && $('.inventoryCalc__form .cstArea').val() == '') {
            showModalWindowStatic('cubicError', '.modal-window', 'hdn');
        } else {
            elem.text(sumCubometr('.inventoryCalc__places--items .calcLine'));
            $('.hiddenVolume').val(sumCubometr('.inventoryCalc__places--items .calcLine'));

            if ($('.inventoryCalc__places--items .txtArea .cstArea').val() != '') {
                $('.hiddenTxt').val($('.inventoryCalc__places--items .txtArea .cstArea').val());
            } else {
                $('.hiddenTxt').val('The client has not filled the tab "Other"');
            }

            var elements = '';
            var strElemets, strToMail;
            $('.inventoryCalc__form--total .summary__list .summary__list--item').each(function (i, n) {
                if (!$(n).hasClass('hide')) {
                    if ($(n).data('slideshow') == 'comments') {
                        return;
                    } else {
                        elements += '\n\r' + $(n).data('slideshow') + ':\n\r';
                        $(n).children('.calcLine:not(.hide)').each(function (i, n) {
                            var name = $(n).find('.calcLine__text').text();
                            var sc = $(n).find('.scope').text();
                            elements += name + ' - ' + sc + '\n\r';
                        });
                    }
                }
            });

            $('.hiddenElements').val(elements);

            showModalWindowStatic('cubicForm', '.modal-window', 'hdn');
        }
    });


    /*- fix a problem with whitespaces in data attr -*/
    $('.inventoryCalc__form--total .summary__list--item .calcLine').each(function () {
        var dt = $(this).prop('dataset').lineshow;
        if (dt != undefined && dt != '') {
            var dt = dt.replace(/\s+/g, '');
        }
        $(this).prop('dataset').lineshow = dt;
    });
    /*- end -*/


    $('.inventoryCalc__form .inventoryCalc__places--items .txtArea .cstArea').on(' keyup', function () {
        var vl = $(this).val();
        var prnt = $('.inventoryCalc__form--total .summary__list--item[data-slideshow="comments"]');
        var contains = parseFloat($('.inventoryCalc__form--total .summary_buttons .count').text());
        hideAllBtn('.inventoryCalc__form--total', '.moreList', '.summary__list', '.moreList', 'open', '.summary_buttons');

        if (vl !== '') {
            if (prnt.hasClass('hide')) {
                prnt.removeClass('hide');
                $('.inventoryCalc__form--total .summary__list--item[data-slideshow="comments"] .cstArea').val(vl);
                ++contains;
                $('.inventoryCalc__form--total .summary_buttons .count').text(contains);
            } else {
                $('.inventoryCalc__form--total .summary__list--item[data-slideshow="comments"] .cstArea').val(vl);
            }


        } else {
            prnt.addClass('hide');
            if (vl == '' && contains !== 0) {
                $(this).blur();
                --contains;
            }
            $('.inventoryCalc__form--total .summary_buttons .count').text(contains);
        }


    });


    /*---- end ----*/


    /*- get free quote page -*/

    $('.primaryQuote__order--items .link').click(function () {
        var dt = $(this).children('.text').text();
        dt = dt.trim();
        localStorage.setItem('What move', dt);
    });

    if (localStorage.getItem('What move') != '' && localStorage.getItem('What move') != undefined) {
        var whtMove = localStorage.getItem('What move');
        var str = 'I need to move: ' + whtMove;
        $('.stepsList #whatStep .inner').text(str);
        updateValueFromInpt('.checkoutContainer #resultWhat', str);
        $('.checkoutInfoBottom input[name="gfqWhat"]').val(str);
    } else {
        $('.stepsList #whatStep .inner').text('I need to move Something :)');
        localStorage.setItem('What move', 'I need to move Something :)');
    }


    $('.citiesSelect').select2({
        containerCssClass: 'citiesContainer',
        dropdownCssClass: 'citiesDropdown'
    });

    $('.citiesSelect').on('change', function () {
        if ($(this).val() != '') {
            var vl = $(this).val();
            $(this).parents('.cities').removeClass('open');
            $('.checkoutInfoBottom input[name="gfqEmail"]').val(vl);
        }
    })

    if ($('.getFreeQuote--form').exists()) {
        var getFreeQuoteSlider = initFlickity('.getFreeQuote--form', {
            pageDots: false,
            contain: 'left',
            wrapAround: false,
            draggable: false,
            prevNextButtons: false,
            adaptiveHeight: true
        });

        setTimeout(function () {
            getFreeQuoteSlider.flickity('resize');
        }, 100);
    }

    var calendar = $('.pickerCalender').datepicker({
        language: 'en',
        view: 'days',
        minView: 'days',
        dateFormat: 'd MM, yyyy',
        minDate: new Date(),
        navTitles: {
            days: ' MM yyyy'
        }
    });

    function rmvStepListCls(stepNum, cls) {
        $('.stepsList .stepsList__titl .st').addClass(cls);
        $('.stepsList .stepsList__titl .st' + '.' + stepNum).removeClass(cls);
    }

    function rmvListStep(stepId, cls) {
        $('.stepsList .step' + stepId).removeClass(cls);
    }

    function updateValueFromInpt(sel, strVal) {
        $(sel).text(strVal);
    }

    $('.radioBtnLine .btns label').click(function () {
        if ($(this).siblings('input').prop('checked')) {
            getFreeQuoteSlider.flickity('next');
        } else {
            return;
        }
    });

    $('.form-slide#fromSlide').on('click', '.confirm', function () {
        var rEx = new RegExp(/^\d+\w*\s*(?:[\-\/]?\s*)?\d*\s*\d+\/?\s*\d*\s*/);
        var self = $(this);
        var clasToAdd = 'err';
        var str = self.siblings('.inputGroup').children('.inpt').val();

        if (str == '') {
            self.siblings('.inputGroup').addClass(clasToAdd);
            self.siblings('.inputGroup').children('.inpt').prop('placeholder', 'You must enter an address').blur();
        }
        /*else if (!rEx.test(str)) {
                   self.parents('.inputGroup').addClass(clasToAdd);
                   self.siblings('.inpt').val('');
                   self.siblings('.inpt').prop('placeholder', 'You used an incorrect address format.').blur();
               } */
        else {
            self.siblings('.inputGroup').removeClass(clasToAdd);
            getFreeQuoteSlider.flickity('next');
            rmvStepListCls('st2', 'hdn');
            rmvListStep('#fromStep', 'hdn');
            updateValueFromInpt('.stepsList #fromStep .inner', str);
            updateValueFromInpt('.checkoutContainer #resultFrom', str);
            $('.checkoutInfoBottom [name="gfqFrom"]').val(str);
        }

    });


    $('.radioBtnLine .btns [name="fromStairs"]').change(function () {
        var str = $(this).siblings('label').text();
        getFreeQuoteSlider.flickity('next');
        rmvStepListCls('st3', 'hdn');
        rmvListStep('#stairsFrom', 'hdn');
        updateValueFromInpt('.stepsList #stairsFrom .inner', str);
        updateValueFromInpt('.checkoutContainer #resultFromStairs .inner', str);
        $('.checkoutInfoBottom [name="gfqFromStairs"]').val(str);
    });


    $('.form-slide#toSlide').on('click', '.confirm', function () {
        var rEx = new RegExp(/^\d+\w*\s*(?:[\-\/]?\s*)?\d*\s*\d+\/?\s*\d*\s*/);
        var self = $(this);
        var clasToAdd = 'err';
        var str = self.siblings('.inputGroup').children('.inpt').val();

        if (str == '') {
            self.siblings('.inputGroup').addClass(clasToAdd);
            self.siblings('.inputGroup').children('.inpt').prop('placeholder', 'You must enter an address').blur();
        }
        /*else if (!rEx.test(str)) {
                   self.parents('.inputGroup').addClass(clasToAdd);
                   self.siblings('.inpt').val('');
                   self.siblings('.inpt').prop('placeholder', 'You used an incorrect address format.').blur();
               }*/
        else {
            self.siblings('.inputGroup').removeClass(clasToAdd);
            getFreeQuoteSlider.flickity('next');
            rmvStepListCls('st4', 'hdn');
            rmvListStep('#toStep', 'hdn');
            updateValueFromInpt('.stepsList #toStep .inner', str);
            updateValueFromInpt('.checkoutContainer #resultTo', str);
            $('.checkoutInfoBottom [name="gfqTo"]').val(str);
        }
    });


    $('.radioBtnLine .btns [name="toStairs"]').change(function () {
        var str = $(this).siblings('label').text();
        getFreeQuoteSlider.flickity('next');
        rmvStepListCls('st5', 'hdn');
        rmvListStep('#stairsTo', 'hdn');
        updateValueFromInpt('.stepsList #stairsTo .inner', str);
        updateValueFromInpt('.checkoutContainer #resultToStairs', str);
        $('.checkoutInfoBottom [name="gfqToStairs"]').val(str);
        $('.getFreeQuote--form_nav-inner .marker').css('left', 'calc(100% - 100px)');
    });


    $('.getFreeQuote--form .submitFreeQuoteForm').click(function (e) {
        e.preventDefault();
        var rdVal = $('.dayTime input[name="dayTime"]:checked').val();
        if ($(calendar).val() != '' && rdVal) {
            var dt = $(calendar).val();
            var dtTime = rdVal;
            var str = 'On ' + dt + '. ' + dtTime;
            updateValueFromInpt('.checkoutContainer #resultDate', str);
            $('.checkoutInfoBottom [name="gfqDate"]').val(str);
            $('.getFreeQuote--checkout').addClass('open');
            if ($(window).innerWidth() < 480) {
                $('html, body').animate({
                    scrollTop: 0
                }, 300);
            }
        } else {
            showModalWindowStatic('freeQuoteErr', '.modal-window', 'hdn');
        }
    });


    $('.form-slide#dateSlide .back').click(function (e) {
        e.preventDefault();
        getFreeQuoteSlider.flickity('previous');
        rmvStepListCls('st4', 'hdn');
        $('.getFreeQuote--form_nav-inner .marker').css('left', 'calc(50% - 50px)');
    });

    $('.form-slide#stairsToSlide .back').click(function (e) {
        e.preventDefault();
        getFreeQuoteSlider.flickity('previous');
        rmvStepListCls('st3', 'hdn');
    })

    $('.form-slide#toSlide .back').click(function (e) {
        e.preventDefault();
        getFreeQuoteSlider.flickity('previous');
        rmvStepListCls('st2', 'hdn');
    })

    $('.form-slide#stairsFromSlide .back').click(function (e) {
        e.preventDefault();
        getFreeQuoteSlider.flickity('previous');
        rmvStepListCls('st1', 'hdn');
    });

    $('.form-slide#fromSlide .back').click(function (e) {
        e.preventDefault();
        $('.getFreeQuote .cities').addClass('open');
    });

    $('.getFreeQuote--checkout .checkoutContainer .back').click(function (e) {
        e.preventDefault();
        $('.getFreeQuote--checkout').removeClass('open');
    });


    var calendar = $('.pickerCalender').datepicker({
        language: 'en',
        view: 'days',
        minView: 'days',
        dateFormat: 'd MM, yyyy',
        navTitles: {
            days: ' MM yyyy'
        },
        toggleSelected: true
    });

    $('.datepickerFormPicker .datepicker--days.datepicker--body').on('click', '.datepicker--cell.datepicker--cell-day', function () {
        //        if ($(this).hasClass('-selected-')) {
        //            $('.datepickerFormPicker .dayTime').removeClass('vsbl');
        //        } else {
        //            $('.datepickerFormPicker .dayTime').addClass('vsbl');
        //        }
        $('.datepickerFormPicker .dayTime').addClass('vsbl');
    });


    $('.datepickerFormPicker .dayTime .dayTime__item').click(function () {
        setTimeout(function () {
            $('.datepickerFormPicker .dayTime').removeClass('vsbl');
        }, 600);
    })


    /*-- end --*/


    /*-- scroll lock body --*/
    var scrolLockElement = $('.modal-content');
    /*- end -*/

    /*- functions for displaying modal windows -*/

    function showModalWindow(btnSel, modalCont, clsToRemove) {
        $(btnSel).click(function (e) {
            e.preventDefault();
            var dtModal = $(this).data('show-modal');
            $(modalCont + '[data-modal=' + dtModal + ']').removeClass(clsToRemove);
            $.scrollLock(true);
        });
    }

    function showModalWindowStatic(windowName, modalCont, clsToRemove) {
        $(modalCont + '[data-modal=' + windowName + ']').removeClass(clsToRemove);
        $.scrollLock(true);
    }

    function closeModalWindow(btnSel, modalCont, clsToRemove) {
        $(btnSel).click(function (e) {
            e.preventDefault();
            $(this).parents(modalCont).addClass(clsToRemove);
            $.scrollLock(false);
        });
    }

    function closeModalWindowStatic(windowName, modalCont, clsToRemove) {
        if (windowName == 'all') {
            $(modalCont).addClass(clsToRemove);
            $.scrollLock(false);
        } else {
            $(modalCont + '[data-modal=' + windowName + ']').addClass(clsToRemove);
            $.scrollLock(false);
        }


    }
    showModalWindow('.showModalWindow', '.modal-window', 'hdn');
    closeModalWindow('.closeModalWindow', '.modal-window', 'hdn');

    cstScroll('.modal-window .modal-content__inner', {});

    /*-- end --*/

    /*-- CF7 form on mail sent event functions for different forms --*/
    $('body').on('wpcf7mailsent', function (event) {
        if ('294' == event.detail.contactFormId) {
            closeModalWindowStatic('all', '.modal-window', 'hdn');
            if (sumCubometr('.inventoryCalc__places--items .calcLine') == 0 && $('.inventoryCalc__form .cstArea').val() != '') {
                setTimeout(function () {
                    showModalWindowStatic('success', '.modal-window', 'hdn')
                }, 500);
            } else {
                setTimeout(function () {
                    showModalWindowStatic('cubicSucces', '.modal-window', 'hdn')
                }, 500);
            }
        } else if ('442' == event.detail.contactFormId) {
            singleCityQuote.flickity('select', 0);
            closeModalWindowStatic('all', '.modal-window', 'hdn');
            setTimeout(function () {
                showModalWindowStatic('successFull', '.modal-window', 'hdn')
            }, 500);
        } else if ('92' == event.detail.contactFormId) {
            closeModalWindowStatic('all', '.modal-window', 'hdn');
            setTimeout(function () {
                showModalWindowStatic('successFull', '.modal-window', 'hdn')
            }, 500);
        } else {
            closeModalWindowStatic('all', '.modal-window', 'hdn');
            setTimeout(function () {
                showModalWindowStatic('success', '.modal-window', 'hdn')
            }, 500);
        }




    });

    /*- end -*/

    /*- anchor navigation page to page -*/
    var myHash = location.hash;
    location.hash = '';
    if (myHash[1] != undefined) {
        $('html, body').animate({
            scrollTop: $(myHash).offset().top
        }, 500);
    }
    /*- end -*/

    /*- anchor link scroll -*/
    $('.scrLink').click(function (event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
    })
    /*- end -*/


    /*- home page rating block -*/
    $('.primaryTestimonials__items .ratingLine').each(function (i, n) {
        var rt = $(n).prop('dataset').rating;
        var fullPercent = $(n).innerWidth();
        var newWidth;
        newWidth = (rt * fullPercent) / 5;
        $(n).css('width', newWidth);
    })
    /*- end -*/

    /*- city single page -*/
    var singleCitySlider = initFlickity('.singleSityPage__content--slider', {
        pageDots: true,
        contain: 'left',
        wrapAround: false,
        draggable: true,
        prevNextButtons: false,
        adaptiveHeight: true,
        autoPlay: 5000
    });

    cstScroll('.singleSityPage__content--text .cnt', {});
    cstScroll('.singleSityPage__content--text_about .cnt', {});

    /*-- quick quote form --*/
    if ($('.singleSityPage--form__slider').exists()) {
        var singleCityQuote = initFlickity('.singleSityPage--form__slider', {
            pageDots: 0,
            contain: 'left',
            wrapAround: 0,
            draggable: 0,
            prevNextButtons: 0,
            adaptiveHeight: 1
        });
        setTimeout(function () {
            singleCityQuote.flickity('resize');
        }, 100);
    }

    /*-- end --*/

    /*-- sitys image map resize --*/
    $('.singleSityPage--map map').imageMapResize();
    $('.cstSelect').select2({
        containerCssClass: 'singlePageSelect',
        dropdownCssClass: 'singlePageSelectDrop'
    });
    /*-- end --*/

    function updateHiddenInpt(inptSel, val) {
        $(inptSel).val(val);
    }

    $('.singleSityPage--form #formLocationDs .button').click(function () {

        var self = $(this);
        var prntCont = '.singleSityPage--form #formLocationDs';
        var errorModal = '.modal-window[data-modal="quickQuoteErr"]';
        var errorModalTxt = errorModal + ' .preCaptions';
        var errorTxt = '';
        var selectStatus = 0;
        var inputStatus = 0;
        $(prntCont + ' select').each(function (i, n) {
            if ($(n).val() !== '') {
                selectStatus += 1;
            }
        });
        $(prntCont + ' input').each(function (i, n) {
            if ($(n).val() !== '') {
                inputStatus += 1;
            }
        });

        if (!selectStatus && !inputStatus) {
            errorTxt = 'Please select a state and Suburb / Town';
            $(errorModalTxt).text(errorTxt);
            showModalWindowStatic('quickQuoteErr', '.modal-window', 'hdn');
        } else if (selectStatus != 2) {
            errorTxt = 'Please select a State';
            $(errorModalTxt).text(errorTxt);
            showModalWindowStatic('quickQuoteErr', '.modal-window', 'hdn');
        } else if (inputStatus != 2) {
            errorTxt = 'Please select a Suburb / Town';
            $(errorModalTxt).text(errorTxt);
            showModalWindowStatic('quickQuoteErr', '.modal-window', 'hdn');
        }

        if (selectStatus == 2 && inputStatus == 2) {
            singleCityQuote.flickity('next');


            updateHiddenInpt('.singleSityPage--form .hiddenFromState', $('#formLocationDs [name="stateFrom"]').val());

            updateHiddenInpt('.singleSityPage--form .hiddenFromSity', $('#formLocationDs [name="cityFrom"]').val());

            updateHiddenInpt('.singleSityPage--form .hiddenToState', $('#formLocationDs [name="stateTo"]').val());

            updateHiddenInpt('.singleSityPage--form .hiddenToSity', $('#formLocationDs [name="cityTo"]').val());


            if ($(window).innerWidth() < 600) {
                $('body,html').animate({
                    scrollTop: $('.singleSityPage--form').offset().top - $('.header').innerHeight()
                }, 500)
            }

            $(window).resize(function () {
                if ($(window).innerWidth() < 600) {
                    $('body,html').animate({
                        scrollTop: $('.singleSityPage--form').offset().top - $('.header').innerHeight()
                    }, 500)
                }
            })
        }


    });


    $('.singleSityPage--form #formLocationMb .button').click(function () {

        var self = $(this);
        var prntCont = '.singleSityPage--form #formLocationMb';
        var errorModal = '.modal-window[data-modal="quickQuoteErr"]';
        var errorModalTxt = errorModal + ' .preCaptions';
        var errorTxt = '';
        var selectStatus = 0;
        var inputStatus = 0;
        $(prntCont + ' select').each(function (i, n) {
            if ($(n).val() !== '') {
                selectStatus += 1;
            }
        });
        $(prntCont + ' input').each(function (i, n) {
            if ($(n).val() !== '') {
                inputStatus += 1;
            }
        });

        if (!selectStatus && !inputStatus) {
            errorTxt = 'Please select a state and Suburb / Town';
            $(errorModalTxt).text(errorTxt);
            showModalWindowStatic('quickQuoteErr', '.modal-window', 'hdn');
        } else if (selectStatus != 2) {
            errorTxt = 'Please select a State';
            $(errorModalTxt).text(errorTxt);
            showModalWindowStatic('quickQuoteErr', '.modal-window', 'hdn');
        } else if (inputStatus != 2) {
            errorTxt = 'Please select a Suburb / Town';
            $(errorModalTxt).text(errorTxt);
            showModalWindowStatic('quickQuoteErr', '.modal-window', 'hdn');
        }

        if (selectStatus == 2 && inputStatus == 2) {
            singleCityQuote.flickity('next');


            updateHiddenInpt('.singleSityPage--form .hiddenFromState', $('#formLocationMb [name="stateFrom"]').val());

            updateHiddenInpt('.singleSityPage--form .hiddenFromSity', $('#formLocationMb [name="cityFrom"]').val());

            updateHiddenInpt('.singleSityPage--form .hiddenToState', $('#formLocationMb [name="stateTo"]').val());

            updateHiddenInpt('.singleSityPage--form .hiddenToSity', $('#formLocationMb [name="cityTo"]').val());


            if ($(window).innerWidth() < 600) {
                $('body,html').animate({
                    scrollTop: $('.singleSityPage--form').offset().top - $('.header').innerHeight()
                }, 500)
            }

            $(window).resize(function () {
                if ($(window).innerWidth() < 600) {
                    $('body,html').animate({
                        scrollTop: $('.singleSityPage--form').offset().top - $('.header').innerHeight()
                    }, 500)
                }
            })
        }


    });

    $('.singleSityPage--form.mobile #formDetailMb .btnLine .button').click(function () {

        var prntCont = $('.singleSityPage--form.mobile #formDetailMb');
        var errorModal = '.modal-window[data-modal="quickQuoteErr"]';
        var errorModalTxt = errorModal + ' .preCaptions';
        var errorTxt = '';
        var name = $(prntCont).find('#nameGQ-mb').val();
        var phone = $(prntCont).find('#phoneGQ-mb').val();
        var email = $(prntCont).find('#emailGQ-mb').val();
        if (phone == '' && email == '' && name == '') {
            errorTxt = 'No inputs is filled. Please filled it';
            $(errorModalTxt).text(errorTxt);
            showModalWindowStatic('quickQuoteErr', '.modal-window', 'hdn');
        } else if (name == '') {
            errorTxt = 'Please enter a name';
            $(errorModalTxt).text(errorTxt);
            showModalWindowStatic('quickQuoteErr', '.modal-window', 'hdn');
        } else if (phone == '') {
            errorTxt = 'Please enter a phone';
            $(errorModalTxt).text(errorTxt);
            showModalWindowStatic('quickQuoteErr', '.modal-window', 'hdn');
        } else if (email == '') {
            errorTxt = 'Please enter a Email';
            $(errorModalTxt).text(errorTxt);
            showModalWindowStatic('quickQuoteErr', '.modal-window', 'hdn');
        } else {
            singleCityQuote.flickity('next');
            updateHiddenInpt('.singleSityPage--form #formQuestionsMb .hiddenQQName', name);
            updateHiddenInpt('.singleSityPage--form #formQuestionsMb .hiddenQQPhone', phone);
            updateHiddenInpt('.singleSityPage--form #formQuestionsMb .hiddenQQEmail', email);

            if ($(window).innerWidth() < 600) {
                $('body,html').animate({
                    scrollTop: $('.singleSityPage--form').offset().top - $('.header').innerHeight()
                }, 500)
            }

            $(window).resize(function () {
                if ($(window).innerWidth() < 600) {
                    $('body,html').animate({
                        scrollTop: $('.singleSityPage--form').offset().top - $('.header').innerHeight()
                    }, 500)
                }
            })
        }
    });


    $('.singleSityPage--form.desktop #formDetailDs .btnLine .button').click(function () {
        var self = $(this);
        var prntCont = $('.singleSityPage--form.desktop #formDetailDs');
        var errorModal = '.modal-window[data-modal="quickQuoteErr"]';
        var errorModalTxt = errorModal + ' .preCaptions';
        var errorTxt = '';
        var name = $(prntCont).find('#nameGQ-ds').val();
        var phone = $(prntCont).find('#phoneGQ-ds').val();
        var email = $(prntCont).find('#emailGQ-ds').val();

        if (phone == '' && email == '' && name == '') {
            errorTxt = 'No inputs is filled. Please filled it';
            $(errorModalTxt).text(errorTxt);
            showModalWindowStatic('quickQuoteErr', '.modal-window', 'hdn');
        } else if (name == '') {
            errorTxt = 'Please enter a name';
            $(errorModalTxt).text(errorTxt);
            showModalWindowStatic('quickQuoteErr', '.modal-window', 'hdn');
        } else if (phone == '') {
            errorTxt = 'Please enter a phone';
            $(errorModalTxt).text(errorTxt);
            showModalWindowStatic('quickQuoteErr', '.modal-window', 'hdn');
        } else if (email == '') {
            errorTxt = 'Please enter a Email';
            $(errorModalTxt).text(errorTxt);
            showModalWindowStatic('quickQuoteErr', '.modal-window', 'hdn');
        } else {
            singleCityQuote.flickity('next');
            updateHiddenInpt('.singleSityPage--form #formQuestionsDs .hiddenQQName', name);
            updateHiddenInpt('.singleSityPage--form #formQuestionsDs .hiddenQQPhone', phone);
            updateHiddenInpt('.singleSityPage--form #formQuestionsDs .hiddenQQEmail', email);

        }
    });


    /*- end -*/

    $('.additionalMenu .additionalMenu__list--link .toggleMenu').click(function () {
        $(this).toggleClass('open');
        $('.additionalMenu .additionalMenu__hidden').toggleClass('open');
    });

    /*- add down arrow for menu -*/

    $('.menu__hiddenList_mobile .menu-item.menu-item-has-children').append('<span class="down"></span>');

    $('.menu__hiddenList_mobile .menu-item.menu-item-has-children .down').on('click', function () {
        if (!$(this).hasClass('active')) {
            $(this).addClass('active');
            $(this).siblings('.sub-menu').addClass('opn');
        } else {
            $(this).removeClass('active');
            $(this).siblings('.sub-menu').removeClass('opn');
        }
    });

})


let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', `${vh}px`);

window.addEventListener('resize', () => {
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
});

/*-- footer ACF google map init -*/
import './../js/acfMap.js';
/*- end -*/

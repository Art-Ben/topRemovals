/*- main style -*/
import './../style/main.scss';
/*- end -*/

/*- jquery -*/
import $ from 'jquery';
/*- end -*/

/*- parallax js plugin -*/ 
import paroller from 'paroller.js';
/*- end -*/

/*- flickity slider -*/
var jQueryBridget = require('jquery-bridget');
var Flickity = require('flickity');
Flickity.setJQuery( $ );
jQueryBridget( 'flickity', Flickity, $ );
require('flickity-as-nav-for');
require('flickity-hash');
require('flickity-sync');
/*- end -*/

/*- datepicker -*/
import 'air-datepicker';
import 'air-datepicker-en';
import 'select2/dist/js/select2.full.js';
/*-end-*/

/*- image map resizer -*/
import imageMapResize from 'image-map-resizer'; 
/*- end -*/

/*- (custom sroll bar) -*/
import jqueryScrollbar from 'jquery.scrollbar';
/*- end -*/

/*- main js -*/
import './../js/scripts.js';
 /*- end -*/


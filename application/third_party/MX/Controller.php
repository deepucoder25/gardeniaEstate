<?php (defined('BASEPATH')) or exit('No direct script access allowed');

/** load the CI class for Modular Extensions **/
require dirname(__FILE__) . '/Base.php';

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link    http://codeigniter.com
 *
 * Description:
 * This library replaces the CodeIgniter Controller class
 * and adds features allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Controller.php
 *
 * @copyright   Copyright (c) 2015 Wiredesignz
 * @version     5.5
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/
class MX_Controller
{
    public $autoload = array();
    public $comp;
    public $data;
    public function __construct()
    {
        $class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));
        log_message('debug', $class . " MX_Controller Initialized");
        Modules::$registry[strtolower($class)] = $this;

        /* copy a loader instance and initialize */
        $this->load = clone load_class('Loader');
        $this->load->initialize($this);

        $this->comp['phone'] = '+91 91080 34519';
        $this->comp['phonehtml'] = 'tel:+9191080 34519';
        $this->comp['phone1'] = '+91 91080 34519';
        $this->comp['phonehtml1'] = 'tel:+9191080 34519';
        $this->comp['supportmail'] = 'info@thegardeniaestate.in';
        $this->comp['replyToMail'] = 'info@thegardeniaestate.in';
        $this->comp['mail'] = 'info@thegardeniaestate.in';
        $this->comp['mailhtml'] = 'mailto:info@thegardeniaestate.in';
        $this->comp['mail1'] = 'info@thegardeniaestate.in';
        $this->comp['mailhtml1'] = 'mailto:info@thegardeniaestate.in';
        $this->comp['tollfree'] = '+91 91080 34519';
        $this->comp['tollfreehtml'] = 'tel:+9191080 34519';
        $this->comp['company3'] = 'The Gardenia Estate';
        $this->comp['companydomain'] = 'thegardeniaestate.in';

        $this->comp['facebookhtml'] = "";
        $this->comp['youtubehtml'] = "";
        $this->comp['instagramhtml'] = "";
        $this->comp['twitterhtml'] = "";
        $this->comp['linkedinhtml'] = "";
        $this->comp['whatsapphtml'] = "https://wa.me/919108034519";

        $this->comp['address'] = "Site Office Address: STRR-Devanahalli, North Bengaluru, Karnataka - 562110";
        $this->comp['address1'] = $this->comp['address'];
        $this->comp['address2'] = $this->comp['address'];
        $this->comp['addressRegion'] = $this->comp['address'];
        $this->comp['postalCode'] = "562110";
        $this->comp['companystate'] = "Karnataka";
        $this->comp['gmap'] = "https://maps.google.com/maps?q=Devanahalli,+Bengaluru&t=&z=13&ie=UTF8&iwloc=&output=embed";
        $this->comp['themeColor'] = "#094B32";

        $this->comp['experience'] = "40+";
        $this->comp['startYear'] = "1986";

        $this->comp['happyClients'] = "39,850+";
        $this->comp['yearsExperience'] = "40+";
        $this->comp['secureShifting'] = "100%";
        $this->comp['statesCovered'] = "20+";

        $this->comp['sku'] = "PM28957";
        $this->comp['mpn'] = "SPM28957";
        // Review
        $this->comp['ratingValue'] = "4.9";
        $this->comp['ratingCount'] = "39850";
        $this->comp['datePublished'] = "15 May, 2026";
        $this->comp['reviewBody'] = "Best Luxury Plotted Development in Devanahalli, Bangalore.";
        $this->comp['reviewperson'] = "Ruchi saha";

        /* autoload module items */
        $this->load->_autoloader($this->autoload);
    }

    public function __get($class)
    {
        return CI::$APP->$class;
    }
}

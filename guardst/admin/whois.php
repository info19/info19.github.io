<?php
class Whois
{
    private $WHOIS_SERVERS = array("com" => array("whois.verisign-grs.com", "whois.crsnic.net"), "net" => array("whois.verisign-grs.com", "whois.crsnic.net"), "org" => array("whois.pir.org", "whois.publicinterestregistry.net"), "info" => array("whois.afilias.info", "whois.afilias.net"), "biz" => array("whois.neulevel.biz"), "us" => array("whois.nic.us"), "uk" => array("whois.nic.uk"), "ca" => array("whois.cira.ca"), "tel" => array("whois.nic.tel"), "ie" => array("whois.iedr.ie", "whois.domainregistry.ie"), "it" => array("whois.nic.it"), "li" => array("whois.nic.li"), "no" => array("whois.norid.no"), "cc" => array("whois.nic.cc"), "eu" => array("whois.eu"), "nu" => array("whois.nic.nu"), "au" => array("whois.aunic.net", "whois.ausregistry.net.au"), "de" => array("whois.denic.de"), "ws" => array("whois.worldsite.ws", "whois.nic.ws", "www.nic.ws"), "sc" => array("whois2.afilias-grs.net"), "mobi" => array("whois.dotmobiregistry.net"), "pro" => array("whois.registrypro.pro", "whois.registry.pro"), "edu" => array("whois.educause.net", "whois.crsnic.net"), "tv" => array("whois.nic.tv", "tvwhois.verisign-grs.com"), "travel" => array("whois.nic.travel"), "name" => array("whois.nic.name"), "in" => array("whois.inregistry.net", "whois.registry.in"), "me" => array("whois.nic.me", "whois.meregistry.net"), "at" => array("whois.nic.at"), "be" => array("whois.dns.be"), "cn" => array("whois.cnnic.cn", "whois.cnnic.net.cn"), "asia" => array("whois.nic.asia"), "ru" => array("whois.nic.ru"), "ro" => array("whois.rotld.ro"), "aero" => array("whois.aero"), "fr" => array("whois.nic.fr"), "se" => array("whois.iis.se", "whois.nic-se.se", "whois.nic.se"), "nl" => array("whois.sidn.nl", "whois.domain-registry.nl"), "nz" => array("whois.srs.net.nz", "whois.domainz.net.nz"), "mx" => array("whois.nic.mx"), "tw" => array("whois.apnic.net", "whois.twnic.net.tw"), "ch" => array("whois.nic.ch"), "hk" => array("whois.hknic.net.hk"), "ac" => array("whois.nic.ac"), "ae" => array("whois.nic.ae"), "af" => array("whois.nic.af"), "ag" => array("whois.nic.ag"), "al" => array("whois.ripe.net"), "am" => array("whois.amnic.net"), "as" => array("whois.nic.as"), "az" => array("whois.ripe.net"), "ba" => array("whois.ripe.net"), "bg" => array("whois.register.bg"), "bi" => array("whois.nic.bi"), "bj" => array("www.nic.bj"), "br" => array("whois.nic.br"), "bt" => array("whois.netnames.net"), "by" => array("whois.ripe.net"), "bz" => array("whois.belizenic.bz"), "cd" => array("whois.nic.cd"), "ck" => array("whois.nic.ck"), "cl" => array("nic.cl"), "coop" => array("whois.nic.coop"), "cx" => array("whois.nic.cx"), "cy" => array("whois.ripe.net"), "cz" => array("whois.nic.cz"), "dk" => array("whois.dk-hostmaster.dk"), "dm" => array("whois.nic.cx"), "dz" => array("whois.ripe.net"), "ee" => array("whois.eenet.ee"), "eg" => array("whois.ripe.net"), "es" => array("whois.ripe.net"), "fi" => array("whois.ficora.fi"), "fo" => array("whois.ripe.net"), "gb" => array("whois.ripe.net"), "ge" => array("whois.ripe.net"), "gl" => array("whois.ripe.net"), "gm" => array("whois.ripe.net"), "gov" => array("whois.nic.gov"), "gr" => array("whois.ripe.net"), "gs" => array("whois.adamsnames.tc"), "hm" => array("whois.registry.hm"), "hn" => array("whois2.afilias-grs.net"), "hr" => array("whois.ripe.net"), "hu" => array("whois.ripe.net"), "il" => array("whois.isoc.org.il"), "int" => array("whois.isi.edu"), "iq" => array("vrx.net"), "ir" => array("whois.nic.ir"), "is" => array("whois.isnic.is"), "je" => array("whois.je"), "jp" => array("whois.jprs.jp"), "kg" => array("whois.domain.kg"), "kr" => array("whois.nic.or.kr"), "la" => array("whois2.afilias-grs.net"), "lt" => array("whois.domreg.lt"), "lu" => array("whois.restena.lu"), "lv" => array("whois.nic.lv"), "ly" => array("whois.lydomains.com"), "ma" => array("whois.iam.net.ma"), "mc" => array("whois.ripe.net"), "md" => array("whois.nic.md"), "mil" => array("whois.nic.mil"), "mk" => array("whois.ripe.net"), "ms" => array("whois.nic.ms"), "mt" => array("whois.ripe.net"), "mu" => array("whois.nic.mu"), "my" => array("whois.mynic.net.my"), "nf" => array("whois.nic.cx"), "pl" => array("whois.dns.pl"), "pr" => array("whois.nic.pr"), "pt" => array("whois.dns.pt"), "sa" => array("saudinic.net.sa"), "sb" => array("whois.nic.net.sb"), "sg" => array("whois.nic.net.sg"), "sh" => array("whois.nic.sh"), "si" => array("whois.arnes.si"), "sk" => array("whois.sk-nic.sk"), "sm" => array("whois.ripe.net"), "st" => array("whois.nic.st"), "su" => array("whois.ripn.net"), "tc" => array("whois.adamsnames.tc"), "tf" => array("whois.nic.tf"), "th" => array("whois.thnic.net"), "tj" => array("whois.nic.tj"), "tk" => array("whois.nic.tk"), "tl" => array("whois.domains.tl"), "tm" => array("whois.nic.tm"), "tn" => array("whois.ripe.net"), "to" => array("whois.tonic.to"), "tp" => array("whois.domains.tl"), "tr" => array("whois.nic.tr"), "ua" => array("whois.ripe.net"), "uy" => array("nic.uy"), "uz" => array("whois.cctld.uz"), "va" => array("whois.ripe.net"), "vc" => array("whois2.afilias-grs.net"), "ve" => array("whois.nic.ve"), "vg" => array("whois.adamsnames.tc"), "yu" => array("whois.ripe.net"), "sexy" => array("whois.nic.sexy"), "menu" => array("whois.nic.menu"), "berlin" => array("whois.nic.berlin"), "academy" => array("whois.donuts.co"), "bargains" => array("whois.donuts.co"), "best" => array("whois.nic.best"), "bid" => array("whois.nic.bid"), "bike" => array("whois.donuts.co"), "black" => array("whois.afilias.net"), "blue" => array("whois.afilias.net"), "boutique" => array("whois.donuts.co"), "builders" => array("whois.donuts.co"), "build" => array("whois.nic.build"), "buzz" => array("whois.nic.buzz"), "cab" => array("whois.donuts.co"), "camera" => array("whois.donuts.co"), "camp" => array("whois.donuts.co"), "capital" => array("whois.donuts.co"), "cards" => array("whois.donuts.co"), "careers" => array("whois.donuts.co"), "catering" => array("whois.donuts.co"), "center" => array("whois.donuts.co"), "ceo" => array("whois.nic.ceo"), "cheap" => array("whois.donuts.co"), "cleaning" => array("whois.donuts.co"), "clothing" => array("whois.donuts.co"), "club" => array("whois.nic.club"), "kiwi" => array("whois.nic.kiwi"), "cm" => array("whois.netcom.cm"), "codes" => array("whois.donuts.co"), "coffee" => array("whois.donuts.co"), "community" => array("whois.donuts.co"), "company" => array("whois.donuts.co"), "computer" => array("whois.donuts.co"), "construction" => array("whois.donuts.co"), "consulting" => array("whois.donuts.co"), "contractors" => array("whois.donuts.co"), "cool" => array("whois.donuts.co"), "cruises" => array("whois.donuts.co"), "dance" => array("whois.unitedtld.com"), "dating" => array("whois.donuts.co"), "democrat" => array("whois.unitedtld.com"), "diamonds" => array("whois.donuts.co"), "directory" => array("whois.donuts.co"), "domains" => array("whois.donuts.co"), "education" => array("whois.donuts.co"), "email" => array("whois.donuts.co"), "engineering" => array("whois.donuts.co"), "enterprises" => array("whois.donuts.co"), "equipment" => array("whois.donuts.co"), "estate" => array("whois.donuts.co"), "events" => array("whois.donuts.co"), "exchange" => array("whois.donuts.co"), "expert" => array("whois.donuts.co"), "exposed" => array("whois.donuts.co"), "farm" => array("whois.donuts.co"), "fish" => array("whois.donuts.co"), "flights" => array("whois.donuts.co"), "florist" => array("whois.donuts.co"), "foundation" => array("whois.donuts.co"), "gallery" => array("whois.donuts.co"), "gift" => array("whois.uniregistry.net"), "glass" => array("whois.donuts.co"), "graphics" => array("whois.donuts.co"), "gripe" => array("whois.donuts.co"), "gs" => array("whois.nic.gs"), "guitars" => array("whois.uniregistry.net"), "guru" => array("whois.donuts.co"), "holdings" => array("whois.donuts.co"), "holiday" => array("whois.donuts.co"), "house" => array("whois.donuts.co"), "ink" => array("whois.centralnic.com"), "institute" => array("whois.donuts.co"), "international" => array("whois.donuts.co"), "kaufen" => array("whois.unitedtld.com"), "kim" => array("whois.afilias.net"), "kitchen" => array("whois.donuts.co"), "land" => array("whois.donuts.co"), "lighting" => array("whois.donuts.co"), "limo" => array("whois.donuts.co"), "link" => array("whois.uniregistry.net"), "luxury" => array("whois.donuts.co"), "maison" => array("whois.donuts.co"), "management" => array("whois.donuts.co"), "marketing" => array("whois.donuts.co"), "meet" => array("whois.afilias.net"), "menu" => array("whois.nic.menu"), "moda" => array("whois.donuts.co"), "ms" => array("whois.nic.ms"), "ninja" => array("whois.donuts.co"), "onl" => array("whois.afilias-srs.net"), "partners" => array("whois.donuts.co"), "parts" => array("whois.donuts.co"), "photography" => array("whois.donuts.co"), "photos" => array("whois.donuts.co"), "photo" => array("whois.uniregistry.net"), "pics" => array("whois.uniregistry.net"), "pink" => array("whois.afilias.net"), "plumbing" => array("whois.donuts.co"), "productions" => array("whois.donuts.co"), "productions" => array("whois.nic.productions"), "properties" => array("whois.donuts.co"), "pub" => array("whois.unitedtld.com"), "recipes" => array("whois.donuts.co"), "red" => array("whois.afilias.net"), "rentals" => array("whois.donuts.co"), "repair" => array("whois.donuts.co"), "report" => array("whois.donuts.co"), "reviews" => array("whois.donuts.co"), "rich" => array("whois.donuts.co"), "rocks" => array("whois.donuts.co"), "services" => array("whois.donuts.co"), "shiksha" => array("whois.afilias.net"), "shoes" => array("whois.donuts.co"), "sh" => array("whois.nic.sh"), "singles" => array("whois.donuts.co"), "solar" => array("whois.donuts.co"), "solutions" => array("whois.donuts.co"), "supply" => array("whois.donuts.co"), "support" => array("whois.donuts.co"), "systems" => array("whois.donuts.co"), "tattoo" => array("whois.uniregistry.net"), "tc" => array("whois.adamsnames.tc"), "technology" => array("whois.donuts.co"), "tips" => array("whois.donuts.co"), "tm" => array("whois.nic.tm"), "today" => array("whois.donuts.co"), "tools" => array("whois.donuts.co"), "trade" => array("whois.nic.trade"), "training" => array("whois.donuts.co"), "uno" => array("whois.nic.uno"), "vacations" => array("whois.donuts.co"), "ventures" => array("whois.donuts.co"), "vg" => array("whois.adamsnames.tc"), "viajes" => array("whois.donuts.co"), "villas" => array("whois.donuts.co"), "vision" => array("whois.donuts.co"), "voyage" => array("whois.donuts.co"), "watch" => array("whois.donuts.co"), "webcam" => array("whois.nic.webcam"), "wiki" => array("whois.nic.wiki"), "works" => array("whois-dub.mm-registry.com"), "xxx" => array("whois.nic.xxx"), "xyz" => array("whois.nic.xyz"), "zone" => array("whois.donuts.co"));
    
    public function whoislookup($domain)
    {
        $domain = trim($domain); //remove space from start and end of domain
        if (substr(strtolower($domain), 0, 7) == "http://")
            $domain = substr($domain, 7); // remove http:// if included
        if (substr(strtolower($domain), 0, 4) == "www.")
            $domain = substr($domain, 4); //remove www from domain
        if (preg_match("/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/", $domain))
            return $this->queryWhois("whois.lacnic.net", $domain);
        elseif (preg_match("/^([-a-z0-9]{2,100})\.([a-z\.]{2,8})$/i", $domain)) {
            $domain_parts = explode(".", $domain);
            $tld          = strtolower(array_pop($domain_parts));
            $server       = $this->WHOIS_SERVERS[$tld][0];
            if (!$server) {
                return "Error: No appropriate Whois server found for $domain domain!";
            }
            $res = $this->queryWhois($server, $domain);
            while (preg_match_all("/Whois Server: (.*)/", $res, $matches)) {
                $server = array_pop($matches[1]);
                $res    = $this->queryWhois($server, $domain);
            }
            return $res;
        } else
            return "Invalid Input";
    }
    private function queryWhois($server, $domain)
    {
        $fp = @fsockopen($server, 43, $errno, $errstr, 20) or $out = "Socket Error " . $errno . " - " . $errstr;
        
        if ($server == "whois.verisign-grs.com")
            $domain = "=" . $domain;
        @fputs($fp, $domain . "\r\n");
        $out = "";
        while (!@feof($fp)) {
            $out .= @fgets($fp);
        }
        fclose($fp);
        return $out;
    }
}

class DomainAge
{
    private $WHOIS_SERVERS = array("com" => array("whois.verisign-grs.com", "/Creation Date:(.*)/"), "net" => array("whois.verisign-grs.com", "/Creation Date:(.*)/"), "org" => array("whois.pir.org", "/Created On:(.*)/"), "info" => array("whois.afilias.info", "/Creation Date:(.*)/"), "biz" => array("whois.neulevel.biz", "/Domain Registration Date:(.*)/"), "us" => array("whois.nic.us", "/Domain Registration Date:(.*)/"), "uk" => array("whois.nic.uk", "/Registered on:(.*)/"), "ca" => array("whois.cira.ca", "/Creation date:(.*)/"), "tel" => array("whois.nic.tel", "/Domain Registration Date:(.*)/"), "ie" => array("whois.iedr.ie", "/registration:(.*)/"), "it" => array("whois.nic.it", "/Created:(.*)/"), "cc" => array("whois.nic.cc", "/Creation Date:(.*)/"), "ws" => array("whois.nic.ws", "/Domain Created:(.*)/"), "sc" => array("whois2.afilias-grs.net", "/Created On:(.*)/"), "mobi" => array("whois.dotmobiregistry.net", "/Created On:(.*)/"), "pro" => array("whois.registrypro.pro", "/Created On:(.*)/"), "edu" => array("whois.educause.net", "/Domain record activated:(.*)/"), "tv" => array("whois.nic.tv", "/Creation Date:(.*)/"), "travel" => array("whois.nic.travel", "/Domain Registration Date:(.*)/"), "in" => array("whois.inregistry.net", "/Created On:(.*)/"), "me" => array("whois.nic.me", "/Domain Create Date:(.*)/"), "cn" => array("whois.cnnic.cn", "/Registration Date:(.*)/"), "asia" => array("whois.nic.asia", "/Domain Create Date:(.*)/"), "ro" => array("whois.rotld.ro", "/Registered On:(.*)/"), "aero" => array("whois.aero", "/Created On:(.*)/"), "nu" => array("whois.nic.nu", "/created:(.*)/"));
    public function age($domain)
    {
        $domain = trim($domain); //remove space from start and end of domain
        if (substr(strtolower($domain), 0, 7) == "http://")
            $domain = substr($domain, 7); // remove http:// if included
        if (substr(strtolower($domain), 0, 4) == "www.")
            $domain = substr($domain, 4); //remove www from domain
        if (preg_match("/^([-a-z0-9]{2,100})\.([a-z\.]{2,8})$/i", $domain)) {
            $domain_parts = explode(".", $domain);
            $tld          = strtolower(array_pop($domain_parts));
            if (!$server = $this->WHOIS_SERVERS[$tld][0]) {
                return false;
            }
            $res = $this->queryWhois($server, $domain);
            if (preg_match($this->WHOIS_SERVERS[$tld][1], $res, $match)) {
                date_default_timezone_set('UTC');
                $time  = time() - strtotime($match[1]);
                $years = floor($time / 31556926);
                $days  = floor(($time % 31556926) / 86400);
                if ($years == "1") {
                    $y = "1 year";
                } else {
                    $y = $years . " years";
                }
                if ($days == "1") {
                    $d = "1 day";
                } else {
                    $d = $days . " days";
                }
                return "$y, $d";
            } else
                return false;
        } else
            return false;
    }
    private function queryWhois($server, $domain)
    {
        $fp = @fsockopen($server, 43, $errno, $errstr, 20) or die("Socket Error " . $errno . " - " . $errstr);
        if ($server == "whois.verisign-grs.com")
            $domain = "=" . $domain;
        fputs($fp, $domain . "\r\n");
        $out = "";
        while (!feof($fp)) {
            $out .= fgets($fp);
        }
        fclose($fp);
        return $out;
    }
}

class socialCount
{
    private $url, $timeout;
    function __construct($url, $timeout = 10)
    {
        $this->url     = rawurlencode($url);
        $this->timeout = $timeout;
    }
    function get_tweets()
    {
        $json_string = $this->get_data('http://urls.api.twitter.com/1/urls/count.json?url=' . $this->url);
        $json        = json_decode($json_string, true);
        return isset($json['count']) ? intval($json['count']) : 0;
    }
    function get_linkedin()
    {
        $json_string = $this->get_data("http://www.linkedin.com/countserv/count/share?url=$this->url&format=json");
        $json        = json_decode($json_string, true);
        return isset($json['count']) ? intval($json['count']) : 0;
    }
    function get_fb()
    {
        $json_string = $this->get_data('http://api.facebook.com/restserver.php?method=links.getStats&format=json&urls=' . $this->url);
        $json        = json_decode($json_string, true);
        
        $share_count   = isset($json[0]['share_count']) ? intval($json[0]['share_count']) : 0;
        $like_count    = isset($json[0]['like_count']) ? intval($json[0]['like_count']) : 0;
        $comment_count = isset($json[0]['comment_count']) ? intval($json[0]['comment_count']) : 0;
        $val           = $share_count . "::" . $like_count . "::" . $comment_count;
        return $val;
    }
    function get_plusones()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://clients6.google.com/rpc");
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"http://' . rawurldecode($this->url) . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-type: application/json'
        ));
        $curl_results = curl_exec($curl);
        curl_close($curl);
        $json = json_decode($curl_results, true);
        return isset($json[0]['result']['metadata']['globalCounts']['count']) ? intval($json[0]['result']['metadata']['globalCounts']['count']) : 0;
    }
    function get_stumble()
    {
        $json_string = $this->get_data('http://www.stumbleupon.com/services/1.01/badge.getinfo?url=' . $this->url);
        $json        = json_decode($json_string, true);
        return isset($json['result']['views']) ? intval($json['result']['views']) : 0;
    }
    function get_delicious()
    {
        $purl     = 'http://' . $this->url;
        $purl     = sprintf('http://api.pinterest.com/v1/urls/count.json?url=%s', $purl);
        $response = $this->get_data($purl);
        $response = str_replace(array(
            '(',
            ')'
        ), '', $response);
        $response = str_replace("receiveCount", '', $response);
        if (!$json = json_decode($response, true))
            return 0;
        return isset($json['count']) ? (int) $json['count'] : 0;
    }
    private function get_data($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        $cont = curl_exec($ch);
        if (curl_error($ch)) {
            echo curl_error($ch) . "<br> <br>";
        }
        return $cont;
    }
}
?>
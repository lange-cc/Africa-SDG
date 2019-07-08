<?php

/**
 *
 */
class model extends Database
{

    function __construct()
    {
        $this->db = parent::__construct();
    }

    public function CreateUserToken($length = 200)
    {
        $characters = 'ghvasfgxcfagsvcfgcgsdvhjvadsgfcxhjewvhdfyuewhdoiedushcuvegdhegdscfvedscvhvdscghewvghcvdghscvghedvschevdscbedjhchjevwcdvghevdghcvedcghvehvdcghevdghbeedscvhjedhsicoherkudscgehjdsbchjbdhbjfdfnbcjndfjkbhjvvhgdvnbdguyftc6374tb34hbf348y83hf3mnkffdjvhjrbndsmhgadfsxvghasvghsjsdlkreyt67tf367uybcdhytte7ufb34hfvyt3f7uh3bbrfhugbhjdfhgcfwetegcebjeewbjhbjcfhjrhefvrehbrhjek4r8u848y7845jvchriuiou943uh3kjvhi3jbvjhf4ruih4ui489u4njvncvrnjkvmnfrjknrvjr834ur8uj24kfiujkvruhvuwhrjkn3h3uhrfu4rhf43nfjk4h8f4hfnjk4fhui4jfn4jknfj4nnfdnvjkrnjvhui4hnjkvnrnccnr4jkf4ih4ujfjfio4jknerifo4fjnjkhiu4hfi4rfhb4ufhu45huygf4rfhjbc4rfhjvbc4jhfjkn4jkfb4kjflekrdojuiegfyrejwfbcu4gerfbbrv4tghb324hjbhjbjhdffhgvnemwddfjhbgjhgewhgvhjbdsejnfhbegrvwjhbjwoifopcjlbdfsvbchjsbjwkjhwjhbfbhcjbewhhrbhvbrhfbhrebwjhwehy74t67t32guvghewfuycg4ruyebchwgiuvjhgefuihuhregwfdhbhjgukfhdgiuh4uf4yuhrejbfjerhufjwebekrjrhuihgui5n5trhgiou4gy45uignfrhfui45hbfhghfuiuh54hrfuig54huyhfgu4i5huyg4hgfhg45htgb3hgtuy45tui45hghregu4ih45uigtyu4h5bkehjfwbfwrteguoerfowiug7ryhweugufjkrbeyufdhb4hwjrijfg4ruiwefbkw4gkuytfgyu4greyugkuy4hkregfuh4yuhio34erilu4rkfw34gfvehrbfkuh4rtvhj4ebrhr4vhjbtf4ihfuih4uyrfj3eryg3uy42ruyhg4yurgyu4gruygt34uhrg24gtyug4t2hguhuigfy48ty43589tugbwkwwgwkvwwvww45w4bwaabejahwin34tegdyuh3bevdghef3devdghcf3ewdevchbejwkhcwehukhjjchvgdvshcvhgewvhchewvghcvewhvcghewvhjcvewgdvghewhdcjewqcnbefwdcgbsaabe_jahwinhjhebrwhjvwemvjhefbdjcjkerwugcvghewbdhcjewdchjbewhgdchewifheriufhgghrfbhvrfhjvbfrdbjvkrebhjfvrehfrehbfhrrh3jhwbr4wbfb4uhwfuy4envmhwbefdhjebrwhfgvherjwbfgh4grhfjbh43fggfuy4oiusvghjdsfuyhjdhgj9i3904euj32neiu237t347uhh3u4ry783yfb34jdfh837t78y23bhje3gry34t78d3hdbhj3gd37t467t3u4bfhg38fy437yfgiu34hf84yf78yg4bfhgc4783tfg4h3jfuy45thjbdjhsvghvghcdsbskjbsdghvcdkjschb367tt43uhbfhgd3gdb3uify38jfm3kfj39uru32gdvf23te23iun3dn3uiyd23sgvcgfsaghvjhsajv';
        $charactersLength = strlen($characters);
        $value = '';
        for ($i = 0; $i < $length; $i++) {
            $value .= $characters[rand(0, $charactersLength - 1)];
        }

        return $value;
    }

    public function getTruncatedValue($value, $precision)
    {
        //Casts provided value
        $value = ( string )$value;

        //Gets pattern matches
        preg_match("/(-+)?\d+(\.\d{1," . $precision . "})?/", $value, $matches);

        //Returns the full pattern match
        return $matches[0];
    }

    public function genPdfThumbnail($source,$output)
    {
        $im = new \Imagick($source . "[0]"); // 0-first page, 1-second page
        //$im->setImageColorspace(255); // prevent image colors from inverting
        $im->setimageformat("jpeg");
        //$im->thumbnailimage(160, 120); // width and height
        if($output != false) {
            $im->writeImage($output);
        }
        $imgBuff = $im->getimageblob();
        $im->clear();
        $im->destroy();
        $img = base64_encode($imgBuff);
        return $img;
    }


}

?>
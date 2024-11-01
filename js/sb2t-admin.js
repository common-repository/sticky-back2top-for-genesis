function showArrow() {
    var arrowEx = document.getElementById("sb2t-demo");
    var colorVal = document.getElementsByName("sb2t_color")[0].value;
    arrowEx.style.backgroundColor = convertHex(colorVal, 75);

    getPointer(arrowEx);
    getSize(arrowEx);
    getPosition(arrowEx);
    getShape(arrowEx);
}

function showType() {
    var typeSelect = document.getElementsByName("sb2t_ptype")[0].value;
    var pointerSelect = document.getElementById("sb2t_pointer");

    var arrowEnd = Number(6);
    var loopEnd = Number(10);
    var otherEnd = Number(13);

    // disable all options
    for (var i=0; i<pointerSelect.length; i++) {
        pointerSelect.options[i].hidden = true;
    }

    //TO DO - Force select of the top option on the new set of select
    //TO DO - Add transition smoothing animation
    
    switch (typeSelect) {
        case "arrows":
            for(var i=0; i<arrowEnd; i++) {
                //show arrows only 
                pointerSelect.options[i].hidden = false;     
            }
             break;
        case "loops":
            for(var i=arrowEnd; i<loopEnd; i++) {
                //show loops only 
                pointerSelect.options[i].hidden = false;     
            }
            break;
        case "other":
            for(var i=loopEnd; i<pointerSelect.length; i++) {
                //show other options only 
                pointerSelect.options[i].hidden = false;     
            }
            break;
        default:
            for(var i=0; i<pointerSelect.length; i++) {
                //show everything 
                pointerSelect.options[i].hidden = false;     
            }
    }
}

function getPointer(myArrow){
    var pVal = document.getElementsByName("sb2t_pointer")[0].value;
    var baseURL = 'url(' + sb2tVARS.imagepath;

    switch (pVal) {
		case "arrow":
            myArrow.style.backgroundImage = baseURL + 'arrow.svg)';
            break;
		case "bigarrow":
            myArrow.style.backgroundImage = baseURL + 'bigarrow.svg)';
            break;
		case "dblarrow":
            myArrow.style.backgroundImage = baseURL + 'doublearrow.svg)';
            break;
		case "circlearrow":
            myArrow.style.backgroundImage = baseURL + 'circlearrow.svg)';
            break;
		case "chevron":
            myArrow.style.backgroundImage = baseURL + 'chevron.svg)';
            break;
		case "triround":
            myArrow.style.backgroundImage = baseURL + 'triangle-rounded.svg)';
            break;
		case "rewindbott":
            myArrow.style.backgroundImage = baseURL + 'rewind_bottom.svg)';
            break;
		case "rewindtop":
            myArrow.style.backgroundImage = baseURL + 'rewind_top.svg)';
            break;
		case "rewindleft":
            myArrow.style.backgroundImage = baseURL + 'rewind_left.svg)';
            break;
		case "rewindright":
            myArrow.style.backgroundImage = baseURL + 'rewind_right.svg)';
            break;                                                
        case "totop":
            myArrow.style.backgroundImage = baseURL + 'totop.svg)';
            break;
        case "topunder":
            myArrow.style.backgroundImage = baseURL + 'topunderarrow.png)';
            break;            
        case "none":
            myArrow.style.backgroundImage = '';
            break;
        default:
            myArrow.style.backgroundImage = baseURL + 'arrow.svg)';
    }
}

function getPosition(myArrow){
    var pLoc = jQuery("input[name='sb2t_location']:checked").val();
    var leftPos;

    switch (pLoc) {
        case "left":
            myArrow.style.left = "3%";
            break;
        case "center":
            myArrow.style.left = "48%";
            break;
        case "right":
            myArrow.style.left = "87%";
            break;
        default:
             myArrow.style.left = "-10%";
    }
}

function getSize(myArrow){
    var pSize = jQuery("input[name='sb2t_size']:checked").val();
		
    switch (pSize) {
        case "small":
            myArrow.style.height = "25px";
            myArrow.style.width = "25px";
            myArrow.style.top = "87%";
            break;
        case "large":
            myArrow.style.height = "45px";
            myArrow.style.width = "45px";
            myArrow.style.top = "75%";
            break;
        case "medium":
            myArrow.style.height = "35px";
            myArrow.style.width = "35px";
            myArrow.style.top = "80%";
            break;
        default:
            myArrow.style.height = "35px";
            myArrow.style.width = "35px";
            myArrow.style.top = "80%";
    }
}

function getShape(myArrow){
    var pShape = jQuery("input[name='sb2t_shape']:checked").val();
    myArrow.style.boxShadow = "2px 4px 8px rgba(0,0,0,0.2)";

    switch (pShape) {
        case "square":
            myArrow.style.borderRadius = "inherit";
            break;
        case "circle":
            myArrow.style.borderRadius = "50%";
            break;
        case "none":
            myArrow.style.borderRadius = "inherit";
            myArrow.style.backgroundColor = "rgba(0,0,0,0)";
            myArrow.style.boxShadow = "2px 4px 8px rgba(0,0,0,0)";
            jQuery("#sb2t_shape").css("fill", "#000000");
            break;
        default:
            myArrow.style.borderRadius = "auto";
            break;
    }
}

function convertHex(hex,opacity){
    hex = hex.replace('#','');
    r = parseInt(hex.substring(0,2), 16);
    g = parseInt(hex.substring(2,4), 16);
    b = parseInt(hex.substring(4,6), 16);

    result = 'rgba('+r+','+g+','+b+','+opacity/100+')';
    return result;
}


function setAds() {
    var myBanner = Math.floor((Math.random() * 10) +1 );
    var bannerAd = document.getElementById("bannerAds");

    var studioPress = '<a target="_blank" href="http://shareasale.com/r.cfm?b=529001&amp;u=1301972&amp;m=28169&amp;urllink=&amp;afftrack="><img src="http://static.shareasale.com/image/28169/728x90-blue.png" border="0" alt="StudioPress Premium WordPress Themes"></a>';
    var amazonHomePage = '<iframe src="//rcm-na.amazon-adsystem.com/e/cm?o=1&p=48&l=ur1&category=amazonhomepage&f=ifr&linkID=d12c775b3c7f834fdeea61edf71320ff&t=teonwr983f-20&tracking_id=teonwr983f-20" width="728" height="90" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';
    var amazonCompAcc = '<iframe src="//rcm-na.amazon-adsystem.com/e/cm?o=1&p=48&l=ur1&category=computers_accesories&banner=18NF42N6YZP5BAY6YXG2&f=ifr&linkID=01ab4b3cdf358055bc6859c12fe58544&t=teonwr983f-20&tracking_id=teonwr983f-20" width="728" height="90" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>';
    var dreamHost1 = "<a href='http://www.dreamhost.com/r.cgi?481119'><img src='http://images.dreamhost.com/rewards/728x90-a.gif' border='0'></a>";

    if (myBanner > 8) {
        bannerAd.innerHTML = studioPress;
    }
    else if (myBanner > 6) {
        bannerAd.innerHTML = amazonCompAcc;
    }
    else if (myBanner > 2) {
        bannerAd.innerHTML = dreamHost1;
    }
    else {
        bannerAd.innerHTML = amazonHomePage;
    }
}
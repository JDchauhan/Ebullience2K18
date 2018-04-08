
particleground(document.getElementById('skill'), {
dotColor: 'rgba(255,255,255,0.5)',
lineColor: 'rgba(255,255,255,0.1)',
density:50000,
maxSpeedX:5,
maxSpeedY:3
});

$(window).on('load',(function() {
$("#overlayer").delay(2000).fadeOut("slow");
}));

var waves = new SineWaves({
el: document.getElementById('waves'),

speed: 3,

width: function() {
    return $(window).width();
},

height: function() {
    return $(window).height();
},

ease: 'SineInOut',

wavesWidth: '50%',

waves: [
    {
    
    timeModifier: 4,
    lineWidth: 1,
    amplitude: -100,
    waveLength: 600
    },
    {
    type: 'SineWave',
    segmentLength: 1,
    },
    {
    timeModifier: 2,
    lineWidth: 2,
    amplitude: -150,
    wavelength: 50
    },
    {
    timeModifier: 1,
    lineWidth: 1,
    amplitude: -200,
    wavelength: 150
    },
    {
    timeModifier: 0.5,
    lineWidth: 1,
    amplitude: -120,
    wavelength: 100
    },
    {
    timeModifier: 0.25,
    lineWidth: 2,
    amplitude: -75,
    wavelength: 400
    }
],

    // Called on window resize
    resizeEvent: function() {
        
        var gradient = this.ctx.createLinearGradient(0, 0, this.width, 0);
        gradient.addColorStop(0,"rgba(230, 255,255, 0.0)");
        gradient.addColorStop(0.5,"rgba(255, 255, 255, 0.05)");
        gradient.addColorStop(1,"rgba(255, 255, 255, 0.0)");
        
        var index = -1;
        var length = this.waves.length;

        for(index=0;index< length;index++){
        this.waves[index].strokeStyle = gradient;
        }
        
        // Clean Up

    }
});

function validateForm() 
{
    var name = document.forms["reg-form"]["name"].value;
    var branch=document.forms["reg-form"]["branch"].value;
    var year=document.forms["reg-form"]["year"].value;
    var email=trim(document.forms["reg-form"]["email"].value);
    var roll_no=document.forms["reg-form"]["roll_no"].value;
    var mob_no=document.forms["reg-form"]["mob_no"].value;
    var pass=document.forms["reg-form"]["pass"].value;

    if (name == "") 
    {
        document.getElementById("message").className="";
        document.getElementById("message").className="error";
        document.getElementById("message").innerHTML="PLEASE ENTER YOUR NAME";
        return false;
    }
    else if(email== "")
    {
        document.getElementById("message").className="";
        document.getElementById("message").className="error";
        document.getElementById("message").innerHTML="PLEASE ENTER YOUR EMAIL";
        return false;
    }
    else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)))
    {
        document.getElementById("message").className="";
        document.getElementById("message").className="error";
        document.getElementById("message").innerHTML="PLEASE ENTER CORRECT EMAIL";
        return false;
    }
    else if(branch== "")
    {
        document.getElementById("message").className="";
        document.getElementById("message").className="error";
        document.getElementById("message").innerHTML="PLEASE ENTER BRANCH NAME";
        return false;
    }
    else if(year== "null")
    {
        document.getElementById("message").className="";
        document.getElementById("message").className="error";
        document.getElementById("message").innerHTML="PLEASE CHOOSE YEAR";
        return false;
    }
    else if(isNaN(roll_no) || roll_no.length < 1 )
    {
        document.getElementById("message").className="";
        document.getElementById("message").className="error";
        document.getElementById("message").innerHTML="PLEASE ENTER CORRECT ROLL NUMBER";
        return false;
    }
    else if(mob_no.length != 10 || isNaN(mob_no))
    {
        document.getElementById("message").className="";
        document.getElementById("message").className="error";
        document.getElementById("message").innerHTML="PLEASE CORRECT 10 digit MOBILE NUMBER";
        return false;
    }
    else if(pass=="")
    {
        document.getElementById("message").className="";
        document.getElementById("message").className="error";
        document.getElementById("message").innerHTML="PLEASE ENTER A PASSWORD";
        return false;
    }
}
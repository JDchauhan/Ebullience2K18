
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
    var clg-name=document.forms["reg-form"]["clg_name"].value;
    var email=document.forms["reg-form"]["email"].value;
    var roll-no=document.forms["reg-form"]["rol_no"].value;
    var mob-no=document.forms["reg-form"]["mob_no"].value;
    var pass=document.forms["reg-form"]["pass"].value;
    if (name == "") 
    {
        document.getElementById("message").className="";
        document.getElementById("message").className="error";
        document.getElementById("message").innerHTML="PLEAE ENTER YOUR NAME";
        return false;
    }
    else if(emai== "")
    {
        document.getElementById("message").className="";
        document.getElementById("message").className="error";
        document.getElementById("message").innerHTML="PLEAE ENTER YOUR EMAIL";
        return false;
    }
    else if!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
    {
        document.getElementById("message").className="";
        document.getElementById("message").className="error";
        document.getElementById("message").innerHTML="PLEAE ENTER CORRECT EMAIL";
        return false;
    }
    else if(clg-name== "")
    {
        document.getElementById("message").className="";
        document.getElementById("message").className="error";
        document.getElementById("message").innerHTML="PLEAE ENTER COLLEGE NAME";
        return false;
    }
    else if(isNaN(roll-no) || x < 1)
    {
        document.getElementById("message").className="";
        document.getElementById("message").className="error";
        document.getElementById("message").innerHTML="PLEAE ENTER ROLL NUMBER";
        return false;
    }
    else if(mob-no.length<10 || isNaN(mob-no))
    {
        document.getElementById("message").className="";
        document.getElementById("message").className="error";
        document.getElementById("message").innerHTML="PLEAE CORRECT MOBILE NUMBER";
        return false;
    }
    else if(pass=="")
    {
        document.getElementById("message").className="";
        document.getElementById("message").className="error";
        document.getElementById("message").innerHTML="PLEAE ENTER A PASSWORD";
        return false;
    }
}

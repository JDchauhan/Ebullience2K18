
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


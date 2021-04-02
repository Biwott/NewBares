<div class="container-fluid">
    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$spin_title}}</h4>
                    <h6> <span class="card-subtitle"> User Balance:</span> <strong>
                            {{convertCurrency(auth()->user(), $balance)}} </strong> </h6>
                    @error('amount')
                    <span class="text text-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                    <div>
                        <table>
                            <td>
                                <form wire:submit.prevent="validateAmount">
                                    <div class="input-group mb-0 p-r-4">
                                        <input type="text" id="amount" wire:model="amount"
                                            class="form-control @error('amount') is-invalid @enderror" value="100"
                                            style="background: none !import ant" maxlength="4" size="4">
                                        <div class="input-group-append">
                                            <button id="spin_button" class="btn btn-success" @error('amount')
                                                disabled=true @enderror>
                                                <span class="">SPIN</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <tr>
                                <td width="260" height="420" class="the_wheel" align="center" valign="center">
                                    <canvas id="canvas" width="320" height="320">
                                        <p style="{color: white}" align="center">
                                            Sorry, your browser doesn't support Please try another.
                                        </p>
                                    </canvas>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script type="text/javascript" src="{{asset('spin/js/Winwheel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('spin/js/TweenMax.min.js')}}"></script>
<script>
    // Create new wheel object specifying the parameters at creation time.
    let theWheel = new Winwheel({
        'outerRadius'     : 150,        // Set outer radius so wheel fits inside the background.
        'innerRadius'     : 40,         // Make wheel hollow so segments don't go all way to center.
        'textFontSize'    : 14,         // Set default font size for the segments.
        'textOrientation' : 'vertical', // Make text vertial so goes down from the outside of wheel.
        'textAlignment'   : 'outer',    // Align text to outside of wheel.
        'numSegments'     : {{$segments->count()}},         // Specify number of segments.
        'segments'        :             // Define segments including colour and text.
        [                
            @foreach ($segments as $segment)
                { 'fillStyle': '{{$segment->color}}', 'text': '{{$segment->name}}' },              
            @endforeach           
        ],
        'animation' :           // Specify the animation to use.
        {
            'type'     : 'spinToStop',
            'duration' : 20,    // Duration in seconds.
            'spins'    : 20,     // Default number of complete spins.
            'callbackFinished' : alertPrize,
            'callbackSound'    : playSound,   // Function to call when the tick sound is to be triggered.
            'soundTrigger'     : 'pin'        // Specify pins are to trigger the sound, the other option is 'segment'.
        },
        'pins' :				// Turn pins on.
        {
            'number'     : {{$segments->count()}},
            'fillStyle'  : 'gold',
            'outerRadius': 4,
        }
    });
    // Loads the tick audio sound in to an audio object.
    let audio = new Audio('/spin/tick.mp3');

    // This function is called when the sound is to be played.
    function playSound()
    {
        // Stop and rewind the sound if it already happens to be playing.
        audio.pause();
        audio.currentTime = 0;

        // Play the sound.
        audio.play();
    }

    // Vars used by the code in this page to do power controls.
    let wheelPower    = 0;
    let wheelSpinning = false;

    // -------------------------------------------------------
    // Function to handle the onClick on the power buttons.
    // -------------------------------------------------------
    function powerSelected(powerLevel)
    {
        // Ensure that power can't be changed while wheel is spinning.
        if (wheelSpinning == false) {
            // Reset all to grey incase this is not the first time the user has selected the power.
            document.getElementById('pw1').className = "";
            document.getElementById('pw2').className = "";
            document.getElementById('pw3').className = "";

            // Now light up all cells below-and-including the one selected by changing the class.
            if (powerLevel >= 1) {
                document.getElementById('pw1').className = "pw1";
            }

            if (powerLevel >= 2) {
                document.getElementById('pw2').className = "pw2";
            }

            if (powerLevel >= 3) {
                document.getElementById('pw3').className = "pw3";
            }

            // Set wheelPower var used when spin button is clicked.
            wheelPower = powerLevel;

            // Light up the spin button by changing it's source image and adding a clickable class to it.
            document.getElementById('spin_button').src = "/spin/spin_on.png";
            document.getElementById('spin_button').className = "clickable";
        }
    }

    // -------------------------------------------------------
    // Click handler for spin button.
    // -------------------------------------------------------
    function startSpin(angler)
    {
        // Ensure that spinning can't be clicked again while already running.
        if (wheelSpinning == false) {
            // Based on the power level selected adjust the number of spins for the wheel, the more times is has
            // to rotate with the duration of the animation the quicker the wheel spins.
           
                theWheel.animation.spins = 3;
          
            theWheel.animation.stopAngle=angler;

            // Disable the spin button so can't click again while wheel is spinning.
            document.getElementById('spin_button').disabled = true;
            document.getElementById('amount').disabled = true;
            document.getElementById('spin_button').innerHTML = "Wait...";
            document.getElementById('spin_button').className="btn btn-secondary"

            // Begin the spin animation by calling startAnimation on the wheel object.
            theWheel.startAnimation();

            // Set to true so that power can't be changed and spin button re-enabled during
            // the current animation. The user will have to reset before spinning again.
            wheelSpinning = true;
        }
    }
    // -------------------------------------------------------
    // Function for reset segment.
    // -------------------------------------------------------
    function setSegment(index, value)
    { 
         theWheel.segments[index].text =value;
         console.log( theWheel.segments[index]);       
    }


   function resetSegments(){
    @foreach ($segments as $segment) 
                theWheel.segments['{{$segment->id}}'].text ='{{$segment->name}}';
                theWheel.segments['{{$segment->id}}'].fillStyle ='{{$segment->color}}';
                console.log( theWheel.segments['{{$segment->id}}']);                
    @endforeach      
    }



   
    function resetWheel()
    {
        theWheel.stopAnimation(false);  // Stop the animation, false as param so does not call callback function.
        theWheel.rotationAngle = 0;     // Re-set the wheel angle to 0 degrees.
        theWheel.draw();                // Call draw to render changes to the wheel.
        // Disable the spin button so can't click again while wheel is spinning.
        document.getElementById('spin_button').disabled = false;
        document.getElementById('amount').disabled = false;
        window.livewire.emit('update-balance');
        document.getElementById('spin_button').innerHTML = "SPIN";
        document.getElementById('spin_button').className="btn btn-success"

        wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
        theWheel.animation.stopAngle=null;
    }

    // -------------------------------------------------------
    // Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters.
    // -------------------------------------------------------
    function alertPrize(indicatedSegment)
    {
        // Just alert to the user what happened.
        // In a real project probably want to do something more interesting than this with the result.
        if (indicatedSegment.text == 'LOOSE TURN') {
            alert('Sorry but you loose a turn.');
        } else if (indicatedSegment.text == 'BANKRUPT') {
            alert('Oh no, you have gone BANKRUPT!');
        } else {
            alert("You have won " + indicatedSegment.text);
            resetWheel();
        }

        
            // Just alert to the user what happened.
            // In a real project probably want to do something more interesting than this with the result.
            if (indicatedSegment.text == 'Loose Turn') {
               // alert('Sorry but you loose a turn.');
              //  document.getElementById('bello').style.display='block';
                $obj=document.getElementById("alert_prize");
                $obj.setAttribute('class','alert alert-has-icon alert-warning');
                $obj.innerHTML="Sorry You have lost. Try again";
                $obj.style.display="block";
            } else {
               // alert("You have won " + indicatedSegment.text);
                //document.getElementById('bello').style.display='block';
                $obj=document.getElementById("alert_prize");
                $obj.setAttribute('class','alert alert-has-icon alert-success');
                $obj.innerHTML="Congratulation you have won "+indicatedSegment.text;
                $obj.style.display="block";
                            }
    }
</script>

<script>
    var _0x51d8=['210135jSBlIX','24788JmQBJW','val','index','ajaxSetup','json','attr','content','preventDefault','POST','ajax','72273BMcKSo','202316OdHlNa','#amount','395039fnNDqQ','435306BJDeLL','errors','value','#spin_button','327646SItOYb','responseJSON','Normal','1DuxGWx','11PRTEjh'];var _0x42b2=function(_0x490d47,_0x4a14be){_0x490d47=_0x490d47-0xb0;var _0x51d831=_0x51d8[_0x490d47];return _0x51d831;};(function(_0x43676f,_0x336865){var _0xa7974f=_0x42b2;while(!![]){try{var _0x22db76=-parseInt(_0xa7974f(0xc3))+-parseInt(_0xa7974f(0xc7))+parseInt(_0xa7974f(0xb4))*parseInt(_0xa7974f(0xb2))+-parseInt(_0xa7974f(0xb5))+-parseInt(_0xa7974f(0xb3))*-parseInt(_0xa7974f(0xbf))+-parseInt(_0xa7974f(0xc0))+parseInt(_0xa7974f(0xc2));if(_0x22db76===_0x336865)break;else _0x43676f['push'](_0x43676f['shift']());}catch(_0x53d12c){_0x43676f['push'](_0x43676f['shift']());}}}(_0x51d8,0x64209),jQuery(document)['ready'](function(_0x2a2d30){var _0x4254d5=_0x42b2;_0x2a2d30(_0x4254d5(0xc6))['click'](function(_0x34372a){var _0x21b08a=_0x4254d5;_0x2a2d30[_0x21b08a(0xb8)]({'headers':{'X-CSRF-TOKEN':jQuery('meta[name=\x22csrf-token\x22]')[_0x21b08a(0xba)](_0x21b08a(0xbb))}}),_0x34372a[_0x21b08a(0xbc)]();var _0x1c8074={'amount':jQuery(_0x21b08a(0xc1))[_0x21b08a(0xb6)](),'instance':_0x21b08a(0xb1)},_0x1e653e=_0x21b08a(0xbd),_0x38de06='now';_0x2a2d30[_0x21b08a(0xbe)]({'type':_0x1e653e,'url':_0x38de06,'data':_0x1c8074,'dataType':_0x21b08a(0xb9),'success':function(_0x43f936){var _0xbe53e9=_0x21b08a;resetSegments(),setSegment(_0x43f936[_0xbe53e9(0xb7)],_0x43f936[_0xbe53e9(0xc5)]),startSpin(_0x43f936['stepper']);},'error':function(_0x353ed6){var _0x573efa=_0x21b08a;alert(_0x353ed6[_0x573efa(0xb0)][_0x573efa(0xc4)]);}});});}));
</script>
@endpush

@push('css')
<link rel="stylesheet" href="{{asset('spin/css/main.css')}}" type="text/css" />
@endpush
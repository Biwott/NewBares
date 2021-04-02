<div class="container-fluid">
    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$spin_title}}</h4>
                    <div wire:poll>
                        {{$this->checkEligible()}}
                    </div>
                    @if($eligible)
                    <h6> <span class="card-subtitle text text-danger"> </span> </h6>
                    <div class="alert alert-success alert-dismissible fade show col-9">
                        <strong>Welcome to Free Spin!</strong><br> Spin Multiple Times and WIN for FREE!!
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                    @else
                    <h6> <span class="card-subtitle text text-danger"> </span> </h6>
                    <div class="alert alert-danger alert-dismissible fade show col-9">
                        <strong>Sorry, No Free Spins at the Moment!</strong><br> Check in later, Thankyou.
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                    @endif
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
    var _0x46c6=['click','11HMdKbP','781123SFPQGm','Free','1672784dBPOuY','content','1706brhsVD','stepper','errors','17593QzJKYx','ajaxSetup','json','responseJSON','1xIDGzF','601wRgIAf','index','now','preventDefault','2faskZC','708299LxaeoG','ajax','meta[name=\x22csrf-token\x22]','ready','189333MQnfda','850082mSvuQw','#spin_button'];var _0x11cc=function(_0xcd481b,_0x1059ea){_0xcd481b=_0xcd481b-0xeb;var _0x46c6d1=_0x46c6[_0xcd481b];return _0x46c6d1;};var _0xb558ce=_0x11cc;(function(_0x11c847,_0x460148){var _0xd25697=_0x11cc;while(!![]){try{var _0x3b3201=parseInt(_0xd25697(0xff))+parseInt(_0xd25697(0xf2))*parseInt(_0xd25697(0xfa))+parseInt(_0xd25697(0xf5))*parseInt(_0xd25697(0xed))+-parseInt(_0xd25697(0xee))*parseInt(_0xd25697(0xfe))+-parseInt(_0xd25697(0xf9))*parseInt(_0xd25697(0x103))+-parseInt(_0xd25697(0x104))+parseInt(_0xd25697(0xf0));if(_0x3b3201===_0x460148)break;else _0x11c847['push'](_0x11c847['shift']());}catch(_0x3cd2af){_0x11c847['push'](_0x11c847['shift']());}}}(_0x46c6,0xf3b6b),jQuery(document)[_0xb558ce(0x102)](function(_0x3c7e1a){var _0x460805=_0xb558ce;_0x3c7e1a(_0x460805(0xeb))[_0x460805(0xec)](function(_0x946d7d){var _0x42f4d5=_0x460805;_0x3c7e1a[_0x42f4d5(0xf6)]({'headers':{'X-CSRF-TOKEN':jQuery(_0x42f4d5(0x101))['attr'](_0x42f4d5(0xf1))}}),_0x946d7d[_0x42f4d5(0xfd)]();var _0x359cf7={'amount':0x14,'instance':_0x42f4d5(0xef)},_0x154cd8='POST',_0x215c56=_0x42f4d5(0xfc);_0x3c7e1a[_0x42f4d5(0x100)]({'type':_0x154cd8,'url':_0x215c56,'data':_0x359cf7,'dataType':_0x42f4d5(0xf7),'success':function(_0x3d0335){var _0x333c24=_0x42f4d5;resetSegments(),setSegment(_0x3d0335[_0x333c24(0xfb)],_0x3d0335['value']),startSpin(_0x3d0335[_0x333c24(0xf3)]);},'error':function(_0x50a925){var _0x50133a=_0x42f4d5;alert(_0x50a925[_0x50133a(0xf8)][_0x50133a(0xf4)]);}});});}));
</script>
@endpush

@push('css')
<link rel="stylesheet" href="{{asset('spin/css/main.css')}}" type="text/css" />
@endpush
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-3">How it works</h3>
                    <h4 class="card-title text-danger"><u>Introduction</u></h4>
                    <div class="alert alert-info"> Earnest is a duly registered Business that specialises in Crypto
                        Exchange, Monetized Ad Promotion, Monetized Blogging among other features. To Join Earnest
                        Ventures you pay a registration fee of Ksh. 550 paid through M-Pesa.
                    </div>
                    <h4 class="card-title mt-2"><u>Referal Rewards</u></h4>
                    <div class="alert alert-warning">
                        At Earnest we compensate users who refer subscribers as follows:
                    </div>
                    <div class="bg-light p-3 mt-3">
                        <h6>Level <span class="font-16"><i
                                    class="mdi mdi-numeric-1-box-multiple-outline mr-2"></i></span>
                            Level 1 Earns <b>Ksh.300</b> for direct referals paid on subscription</h6>
                        <hr>
                        <h6>Level <span class="font-16"><i
                                    class="mdi mdi-numeric-2-box-multiple-outline mr-2"></i></span>
                            Level 2 Earns <b>Ksh.150</b> from Level 1 of your referal
                            <a href="https://prepros.io"></a></h6>
                        <hr>
                        <h6>Level <span class="font-16"><i
                                    class="mdi mdi-numeric-3-box-multiple-outline mr-2"></i></span>
                            Level 3 Earns <b>Ksh.50</b> from Level1 of your Referal's Level 1 Referal</h6>
                    </div>
                    <h4 class="card-title mt-4"><u> Crypto Forex Trading</u></h4>
                    <div class="alert alert-success">
                        <b>####You can BUY or SELL BTC/KES at any time you wish with our Free Trade Advisory Bot###</b>
                        <br>
                        Normal Forex(Foreign Exchange) involves trading of currency pairs capitalisng on buying and
                        selling on market flactuations. Crypto Forex is similar to normal
                        Forex but it is advantageous in that the market does(24/7) and has low volatility.
                        At Earnest we currently offer Bitcoin(BTC) to Kenyan Shilling(KES) and Vice Versa trading at
                        affordable fees at your convenience.                        
                    </div>
                    <h4 class="card-title mt-4"><u> Monetized Video Ads</u></h4>
                    <div class="alert alert-primary">
                        <b>####Earn with Earnest when you Watch Video Ads ###</b>
                        <br>
                        We pay upto Ksh. 20 per video view. Users who choose to pay a premium fee of Ksh. 2000 can watch
                        20 videos per day(Ksh 400)
                        for 7 days. Users can also contact us to promote their copyright content at affordable fees .e.g
                        property, songs,
                        business e.t.c
                    </div>
                    <h4 class="card-title mt-4"><u> Monetized Blog Content</u></h4>
                    <div class="alert alert-info">
                        <b>####All Subscribed Users are Free to post any blog content and earn upto Ksh 300###</b>
                        <br>
                        Earnest has a public blog that allows subscribed users to post and earn upto Ksh 300 per
                        approval.
                        Approved blogs will be publicly visible with the name of the user who posted the blog being shown.
                    </div>
                    <h4 class="card-title mt-4"><u> Welcome Spin</u></h4>
                    <div class="alert alert-warning">
                        <b>#### Get 1 free Lucky Spin on Joining our platform and win prizes!!!###</b>
                        <br>
                    </div>
                    <h4 class="card-title mt-4"><u> Free Bonus Spin</u></h4>
                    <div class="alert alert-primary">
                        <b>#### We often give free spins that allows you spin to as much as you can spin!!!###</b>
                        <br>
                    </div>
                    @if (auth()->user()->active==0)
                    <div class="alert alert-success">
                        <b>Ready to Join? Pay a registration fee of Ksh. 550 Now to access these Premium Services</b>
                        <hr>
                        <a href="{{route('user.deposit.funds')}}">
                            <Button class="btn btn-primary"> Subscribe Now</Button>
                        </a>
                    </div>
                    @endif       
                </div>
            </div>
        </div>
    </div>
</div>
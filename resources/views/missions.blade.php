@extends('layouts.page', ['title' => 'Missions'])

@section('page')

    <!--TODO: Confirm missionary areas-->
    <!--TODO: Hero image - missions -->
    <!--TODO: Finish content-->

    @introsection(['title' => 'Faith Promise Missions', 'class' => '', 'image' => ''])
    <p>Each year our church plans multiple international mission trips. You can find contact information and details by selecting a trip below. All donations made to Faith Promise Church to support mission trips are fully tax deductible.</p>
    <p>We also engage the world around us, sharing the hope of Christ in tangible ways. Below you will find several opportunities to serve our community.</p>
    @endintrosection

    @cardsection(['title' => 'Upcoming Trips', 'class' => 'Section--lightGrey', 'cards' => $locations, 'no_text' => true])
    @endcardsection

    @textsection(['title' => 'Get Updates', 'class' => '', 'image' => ''])
    <p>Sign up for email notifications and we'll let you know when new trips are planned.</p>
    <a class="Button">Sign Up</a>
    <!--TODO: Get url for missions updates-->
    @endtextsection


    <div class="StaffSection Section--lightGrey">
        <div class="StaffSection-container">
            <h2 class="StaffSection-title">Missionaries</h2>
            <ul class="StaffSection-grid">
                @foreach($missionaries as $missionary)
                    <li class="StaffSection-item">
                        <a class="StaffSection-card" href="{{ $missionary->url }}">
                            <span class="StaffSection-photo" style="background-image:url('{{ $missionary->thumbnail }}');"></span>
                            <span class="StaffSection-name">{{ $missionary->name }}</span>
                            <span class="StaffSection-staffTitle">{{ ! is_null($missionary->missionlocation) ? $missionary->missionlocation->name : '' }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="GridSection">
        <div class="GridSection-container">
            <div class="GridSection-title">Serving our Community</div>
            KidsHope, Clothing ministry, Angel Tree
        </div>
    </div>

    @include('partials.have_questions', ['email' => 'missions@faithpromise.org', 'text' => 'If you still have questions about a trip or ways to get involved, please contact', 'class' => 'Section--lightGrey'])

@endsection
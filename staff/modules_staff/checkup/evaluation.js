var modalBtn_evaluation = document.querySelector('.modal-btn-evaluation'); //sua ten
    var modalBg_evaluation = document.querySelector('.modal-bg-evaluation');
    var modalClose_evaluation = document.querySelector('.modal-close-evaluation');

    modalBtn_evaluation.addEventListener('click', function(){
        modalBg_evaluation.classList.add('bg-evaluation-active');
    });
    
    modalClose_evaluation.addEventListener('click', function(){
        modalBg_evaluation.classList.remove('bg-evaluation-active');
    });


    // ==== Star votingRating ====
    const btn = document.querySelector("button");
    const post = document.querySelector(".post");
    const widget = document.querySelector(".star-widget");
    const votingRate = document.querySelector("#votingRate");

    const rate1 = document.querySelector("#rate-1");
    const rate2 = document.querySelector("#rate-2");
    const rate3 = document.querySelector("#rate-3");
    const rate4 = document.querySelector("#rate-4");
    const rate5 = document.querySelector("#rate-5");

    rate1.onclick = ()=>{
        votingRate.value = "1";
    }
    rate2.onclick = ()=>{
        votingRate.value = "2";
    }
    rate3.onclick = ()=>{
        votingRate.value = "3";
    }
    rate4.onclick = ()=>{
        votingRate.value = "4";
    }
    rate5.onclick = ()=>{
        votingRate.value = "5";
    }
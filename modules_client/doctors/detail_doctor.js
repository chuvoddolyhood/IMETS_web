const chatbot = document.getElementById('chatbot');
const chatbot_icon = document.getElementById('chatbot-icon');
const chatbot_box = document.getElementById('chatbot-box');

if(chatbot_icon){
	chatbot_icon.addEventListener('click', ()=>{
		chatbot_box.classList.add('chatbot_active');
		chatbot_icon.classList.add('chatbot_unactive');
	})
}


let thumbnails = document.getElementsByClassName('thumbnail_detail')
let activeImages = document.getElementsByClassName('active')

for (var i=0; i < thumbnails.length; i++){

	thumbnails[i].addEventListener('mouseover', function(){
		console.log(activeImages)
				
		if (activeImages.length > 0){
			activeImages[0].classList.remove('active')
		}
				

		this.classList.add('active')
		document.getElementById('featured_detail').src = this.src
	})
}


let buttonRight = document.getElementById('slideRight_detail');
let buttonLeft = document.getElementById('slideLeft_detail');

buttonLeft.addEventListener('click', function(){
	document.getElementById('slider_detail').scrollLeft -= 180
})

buttonRight.addEventListener('click', function(){
	document.getElementById('slider_detail').scrollLeft += 180
})

function confirm_Booking(){
    return confirm("Bạn có chắc muốn chọn ngày này để đến khám ?");
}

const txts=document.querySelector(".animate-text").children,
txtsLen=txts.length;
let index=0;
const textInTimer=3000,
textOutTimer=2800;

function animateText() {
	for(let i=0; i<txtsLen; i++){
		txts[i].classList.remove("text-in","text-out");
	}

	txts[index].classList.add("text-in");

	setTimeout(function(){
		txts[index].classList.add("text-out");
	},textOutTimer)

	setTimeout(function(){
		if(index == txtsLen-1){
			index=0;
		}else{
			index++;
		}
		animateText();
	},textInTimer);
}
window.onload=animateText;
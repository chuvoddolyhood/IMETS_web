const counters = document.querySelectorAll(".counter");

counters.forEach((counter) => {
  counter.innerText = "0";

  const updateCounter = () => {
    const target = +counter.getAttribute("data-target");
    const c = +counter.innerText;

    const increment = target / 2000;

    if (c < target) {
      counter.innerText = `${Math.ceil(c + increment)}`;
      setTimeout(updateCounter, 1);
    } else {
      counter.innerText = target;
    }
  };

  updateCounter();
});


//Chatbot
const chatbotBtn = document.getElementById("btnFixed");

function activeChatBot(){
  
  let chatbotForm = document.getElementById("chatbot");
  let itemClass = chatbotForm.className;

  if(itemClass === "chatbot--closed"){
    chatbotForm.classList.remove("chatbot--closed");
    chatbotForm.classList.add("chatbot--open");
  }else{
    chatbotForm.classList.remove("chatbot--open");
    chatbotForm.classList.add("chatbot--closed");
  }
}

if(chatbotBtn){
  chatbotBtn.addEventListener("click", ()=>{
    activeChatBot();
  })
}
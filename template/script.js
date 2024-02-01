const chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input span");
const chatbox= document.querySelector(".chatbox");
const chatbotToggler = document.querySelector(".chatbot-toggler");
const chatbotCloseBtn = document.querySelector(".close-btn");

let userMessage;

const createChatli = (message,className) =>{
    const chatli = document.createElement("li");
    chatli.classList.add("chat", className);
    let chatContent = className ==="outgoing" ?`<p>${message}</p>`: `<span class="material-symbols-outlined">smart_toy</span><p>${message}</p>`;
    chatli.innerHTML = chatContent;
    chatli.querySelector("p").textContent = message;
    return chatli;
}

const handleChat=()=>{ 
    userMessage= chatInput.value.trim();
    if(!userMessage) return;
    chatInput.value ="";

   chatbox.appendChild(createChatli(userMessage, "outgoing"));
   chatbox.scrollTo(0, chatbox.scrollHeight);

   setTimeout(() =>{
    chatbox.appendChild(createChatli("Thinking....", "incoming"));
    chatbox.scrollTo(0, chatbox.scrollHeight);
   },600)
}

chatbotToggler.addEventListener("click",()=> document.body.classList.toggle("show-chatbot"));
chatbotCloseBtn.addEventListener("click",()=> document.body.classList.remove("show-chatbot"));
sendChatBtn.addEventListener("click",handleChat);
<template>
    <div>
        <div class="media">
            <div class="col-span-4"></div>
            <div class="col-span-4">
                <div class='py-8 px-4'>
                    <div class="text-center text-2xl">
                        <p class="text-serif bg-clip-text text-transparent bg-gradient-to-r to-indigo-200 font-bold from-indigo-800">
                            Genearate AI reponse ASSITANCE
                        </p>
                    </div>
                    <div class="py-20 px-5">
                            <div class="" id="text"></div>
                    </div>
                </div>
            </div>
            <div class="col-span-4"></div>
        </div>
    </div>
</template>
<script>
import LayoutA from './MainLayout/LayoutA.vue';
export default {
    layout:LayoutA,
    methods: {
        commence()
        {
            const text = document.getElementById("text");
            let plus = 
            [
                "Bonjour a vous Mr/Melle, l'utilisateur dans notre site web",
                "Itelligence regenerate vous donnez plus reponse sur votre question",
                "Simplicite de votre recherche et votre projet",
                "Intelligence pour votre aide et votre réaction !!!"
            ];
            let textIndex =0;
            function animation()
            {
               
                let index = -1;
                let texting = "";
                const child = document.createElement("p");
                const child1 = document.createElement('span');
                text.appendChild(child);
                const name = plus[textIndex];
                if(textIndex<plus.length)
                {
                   
                    console.log(textIndex);
                    const timer = setInterval(() => {
                        index++;
                        if(index<name.length)
                        {
                            
                            texting+= name[index];
                            child.appendChild(child1);
                            child1.textContent=texting;
                            child1.classList.add('text-blue-400',"text-[22px]","font-bold");    
                            //child.classList.add('animate-pulse','text-[22px]',"hue-rotate-[180deg]","font-bold")
                           //child.innerHTML = texting; 
                            
                        }
                        else
                        {
                            clearInterval(timer);
                            let nombre = name.length;
                            const inter = setInterval(() => {
                               nombre--;
                                if(nombre>=0)
                                {
                                  child1.innerHTML = child1.innerHTML.slice(0,-1);
                                 // child.classList.add("animate-bounce","transition duration-100")
                                }
                                else{
                                    text.removeChild(child)
                                    clearInterval(inter);
                                     setTimeout(animation(),textIndex=textIndex+1,200)
                                }
                            }, 120);
                        }
                    }, 120);
                }
                else{
                 textIndex = 0;
                 animation();
                }


            }
           animation();
        },
        see()
        {
            const text = document.getElementById("text");
            text.innerHTML = "";
            console.log("bien");
        }
    },
    beforeDestroy() {
        this.commence();
    },
    beforeUnmount()
    {
        this.see();
    },
    mounted() {
        this.commence();
    },
   
}
</script>

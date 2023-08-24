<script setup>


</script>
<template>
    <div>
        <div class="media">
            <div class="col-span-6 py-3 px-4">
                <div class="py-4 px-5 bg-gray-200 rounded-md shadow-lg shadow-stone-950">
                    <div class="py-4">
                        <div class="text-center">
                            <p class="font-bold">votre question sur <span class="link">Generate</span></p>
                        </div>
                    </div>
                    <form >
                        <div class="relative">
                            <input v-model="que" type="text" class="input">
                        </div>
                        <div class="py-2 px-2 flex justify-end items-center">
                            <button 
                            @click.prevent="question"
                            class="btn" v-if="!text.length>0">Question <i class="fas fa-warning"></i></button>
                            <button
                            @click.prevent="annuler"
                             class="btn" v-else>Annuler <i class="fas"></i></button>
                        </div>
                    </form>
                    <div class="py-4 px-7">
                        <div class="" id="text">
                            <p class="indent-12 text-slate-600 font-bold text-[14px]" ></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-6"></div>
        </div>
    </div>
</template>
<script>
import { usePage } from '@inertiajs/vue3';
import { computed } from "vue"
export default {
    data() {
        return {
            que: "",
            submit:false,
            text:"",
            index:-1,
            resultat:[],
            interval:null,
        }
    },
    methods: {
        vide()
        {
            
        },
        annuler()
        {
            this.submit = true;
            const text = document.getElementById('text');
           let index = this.text.length;
          const interval = setInterval(() => {
            if(this.index>0)
            {
                this.text = this.text.slice(0,-1)
                this.index--;
            }
            else{
                clearInterval(interval);
                clearInterval(this.interval);
                this.index=-1;
                text.innerHTML = "";
                this.text =""
            }
          }, 10);
          
        },
        question() {
            this.text="";
            const write = document.getElementById("text");
            const page = usePage();
            const donne = page.props.reponse;
            const quet = this.que;
            const recherche = this.que.split(' ');
            let index = /vous/.test(recherche)?recherche.indexOf('vous'):null;
            const regex = new RegExp("\\b"+ recherche.join("|")+"\\b","gi");
            donne.forEach(element => {
               const reponse = element.cle;
                const matching = reponse.match(regex)
                const vous = /"vous"/.test(reponse);
                if(element.cle.match(regex) && !vous)
                {
                    element = {...element}
                    this.resultat.push(element)
                }
                else if(vous && vous.length>=0)
                {
                    element = {...element}
                    this.resultat.push(element)
                }
                else{
                   this.element = {}
                }
              
            });
            
            const resultat =this.que.length>0?this.resultat:[];
            
            this.resultat = [];
            let currentIndex = 0;
            if(resultat.length>0)
            {
                this.text="hello";
               function display(stay,bien){
                const parent = document.getElementById("text")
                const child = document.createElement("p");
               if(currentIndex<resultat.length)
               {

                    let hello = "<span class='text-indigo-950 px-2'>"+(currentIndex+1)+"</span>";
                    let index = -1;
                    stay = hello;
                    parent.appendChild(child);
                    const name = resultat[currentIndex].reponse;
                    const interval = setInterval(() => {
                        index++;
                        if(index<name.length)
                        {
                            hello += name[index];
                            child.innerHTML=hello;
                            child.classList.add("text-sm","text-stone-400","font-bold")
                        }
                        else{
                            clearInterval(interval);  
                           setTimeout(display,currentIndex++,20)

                        }
                    },120);
                }
                else{
                  
                       //parent.removeChild(child);
                  
                }
               
                
               }
               display(this.text,);
               const post = [];
               resultat.forEach(element => {
                element = {...element};
                post.push(element.reponse);
               });
               this.$inertia.post(route('reponse'),{
                    "admin_id":page.props.user.id,
                    "question":this.que,
                    "reponse":post.join('&&'),
                    "confirmed":true
               })
               this.que ="";
               if(write.clientHeight>60)
               {

                this.submit=true;
               }
               else{
                this.submit=false
               }

               
            }
            else{
                
                const child = document.createElement('p');
                const text = 
                [
                "je ne comprends bien ce que vous dite sur <span class='underline px-2 text-purple-800'>" + this.que +"</span>",
                "le phrase que vous saisie ne pas clair, mais apre je vous donne reponse de <span class='underline px-2 text-purple-800'>" + this.que +"</span>",
                "Est que je suis le seul ne savait pas ça, sur le <span class='underline px-2 text-purple-800'>" + this.que +"</span>",
                "veuillez reformule votre phrase, le <span class='underline px-2 text-purple-800'>"+this.que +"</span> je ne trouve rien reponse a vos question",
                "vous dit que <span class='underline px-2 text-purple-800'>"+this.que +"</span> je ne trouve rien de reponse votre phrase",
                "je suis désole je ne trouve reponse de <span class='underline px-2 text-purple-800'>"+this.que +"</span> veuillez entre noveaux ", ];
                let index = Math.floor(Math.random()*((text.length-1)-0+1)+0);
                let indexText = -1;
                const reponse = this.que;
                child.classList.add("text-stone-400")
                write.appendChild(child)
                this.interval = setInterval(() => {
                    this.index++;
                    if(this.index>=text[index].length)
                    {
                        this.text = text[index]; 
                        const cologue = text[index];
                        child.innerHTML = this.text
                        clearInterval(this.interval)
                        write.innerHTML="";
                        const id =page.props.user.id;
                        this.$inertia.post(route('reponse'),{
                            "admin_id":id,
                            "question":cologue,
                            "confirmed":false,
                            "reponse":reponse,
                        })

                    }
                    else{
                        this.text+=text[index][this.index]
                        child.innerHTML = this.text
                        
                    }
                }, 60);
                this.que=""
                
               
            }
        }
    },
}
</script>
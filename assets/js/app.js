require('../scss/main.scss');




class person{
    constructor(name){
        this.name = name;
    }

walk(){
    console.log(this.name + 'is walking');
}
}

let bob = new person('bob');
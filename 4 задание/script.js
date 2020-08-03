

function GetDigitCount(number) 
{
    return String(number).length
}




function DigitToString(number)
{
    let one = ["один","два","три","четыре","пять","шесть","семь","восемь","девять"]
    let ten = ["одиннадцать","двенадцать","тринадцать","четырнадцать","пятнадцать","шестнадцать","семнадцать","восемнадцать","девятнадцать"]
    let tentwelve = ["десять","двадцать","тридцать","сорок","пятьдесят","шестьдесят","семьдесят","восемьдесят","девяносто"]
    let sot = ["сто","двести","триста","четыреста","пятьсот","шестьсот","семьсот","восемьсот","девятьсот"]
    let thousand = ["тысяча","две тысячи","три тысячи","четыре тысячи","пять тысячь","шесть тысячь","семь тысячь","восемь тысячь","девять тысячь"];
    switch(GetDigitCount(number))
    {
        case 1:
            return one[number-1]; // только еденицы
            break;
        case 2:
            
        if(number < 20&& number>10)// от 11 до 19
            {
                return ten[number%10 - 1];
            }
        if(number % 10 == 0) // только десятки
            {
               return tentwelve[number/10 -1];
            }

        let unity = parseInt(number / 10); // десятки и еденицы
        let dozens = number % 10;

        return tentwelve[unity - 1] + " "+ one[dozens - 1] ;

            break;
        case 3:
            if(number % 100 == 0) // если только сотни (300)
            {
                return result = sot[number / 100 - 1];
            }
            if (number % 10 == 0)// сотни и десятки (330)
            {
                return result = sot[parseInt(number/100 - 1)] +" "+ tentwelve[(number % 100 /10 - 1)];
            }

            if(number % 100 < 20 && number % 100 > 10)// сотни десятки и еденицы с 11 - 19 (311 - 319)
            {
                return result = sot[parseInt(number/100 -1)] + " " + ten[number %10 - 1];
            }
            return sot[parseInt(number/100 -1)]+ " " + tentwelve[parseInt(number%100 / 10)- 1] + " " + one[number%10 - 1];

            break; 
        case 4:
            if(number % 1000 == 0) // только тысячи (2000)
            {
                return thousand[number / 1000 - 1];
            } 
            if(number % 100 == 0) // тысячи и сотни (2200)
            {
                return thousand[parseInt(number / 1000) - 1] + " " + sot[number % 1000 / 100 -1]
            }
            if(number % 100 >10 && number %100 < 20)// тысячи сотни десятки еденицы(от 11 до 19) (2212)
            {
                return thousand[parseInt(number / 1000) - 1] + " " + sot[parseInt(number % 1000 / 100) -1] + " " + ten[number % 10 - 1]
            }
            if(number % 10 == 0)
            {
                return thousand[parseInt(number / 1000) - 1] + " " + sot[parseInt(number % 1000 / 100) -1] + " " + tentwelve[number % 100 / 10 - 1] // тысячи сотни десятки (2230)
            }

            return thousand[parseInt(number / 1000) - 1] + " " + sot[parseInt(number % 1000 / 100) -1] + " " + tentwelve[parseInt(number % 100 / 10) - 1] + " " + one[number%10 - 1]// тысячи сотни десятки еденицы (2234)
            break;
    }

}

let number = 9999

console.log(DigitToString(number))


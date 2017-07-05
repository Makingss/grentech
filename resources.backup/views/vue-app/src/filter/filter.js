let formate=(value)=>{
  return value>=10?value:'0'+value;
}
export const dateFilter=(time,type)=>{
  time==time.length==10?time*10:time;
  let date=new Date(time);
  let year=date.getFullYear();
  let month=date.getMonth()+1;
  let day=date.getDate();
  let hours=date.getHours();
  let minutes=date.getMinutes();
  let seconds=date.getSeconds();
  let result={};
  var config={
    'y-m':`${formate(year)}-${formate(month)}`,
    'y-m-d':`${formate(year)}-${formate(month)}-${formate(day)}`,
    'm-d':`${formate(month)}-${formate(day)}`,
    'y-m-d h:m:s':`${formate(year)}-${formate(month)}-${formate(day)} ${formate(hours)}:${formate(minutes)}:${formate(seconds)}`,
    'y-m-d h:m':`${formate(year)}-${formate(month)}-${formate(day)} ${formate(hours)}:${formate(minutes)}`,
    'm-d h:m:s':`${formate(month)}-${formate(day)} ${formate(hours)}:${formate(minutes)}:${formate(minutes)}`,
    'h:m:s':`${formate(hours)}:${formate(minutes)}:${formate(minutes)}`,
    'h:m':`${formate(hours)}:${formate(minutes)}`
  }
  return config[type];
}

import { Pipe, PipeTransform } from '@angular/core';

declare var jQuery:any;
declare var $:any;

@Pipe({
  name: 'filter'
})
export class FilterPipe implements PipeTransform
{


  transform(value: any, args: any, searchByTitle:boolean, searchByDescription:boolean, itemAccate: String): any//searchByTitle: boolean, searchByDescription: boolean
  {
    let resultPosts = [];
    for (const post of value)
    {
        if(searchByTitle == true && searchByDescription == false)
        {
          if(post.actitle.indexOf(args) > -1 )
          {
            if(itemAccate == "Mostrar todos")
            {
              if(post.accate == 1 || post.accate == 2 || post.accate == 3 || post.accate == 4)
              {
                resultPosts.push(post);
              }
            }
            else if(itemAccate == "Naturaleza")
            {
              if(post.accate == 1)
              {
                resultPosts.push(post);
              }
            }
            else if(itemAccate == "Gastronomía")
            {
              if(post.accate == 2)
              {
                resultPosts.push(post);
              }
            }
            else if(itemAccate == "Deporte")
            {
              if(post.accate == 3)
              {
                resultPosts.push(post);
              }
            }
            else if(itemAccate == "Cultura")
            {
              if(post.accate == 4)
              {
                resultPosts.push(post);
              }
            }
          }
        }
        else if(searchByTitle == true && searchByDescription == true)
        {
          
          if(post.actitle.indexOf(args) > -1 && post.acdesc.indexOf(args) > -1)
          {
            if(itemAccate == "Mostrar todos")
            {
              if(post.accate == 1 || post.accate == 2 || post.accate == 3 || post.accate == 4)
              {
                resultPosts.push(post);
              }
            }
            else if(itemAccate == "Naturaleza")
            {
              if(post.accate == 1)
              {
                resultPosts.push(post);
              }
            }
            else if(itemAccate == "Gastronomía")
            {
              if(post.accate == 2)
              {
                resultPosts.push(post);
              }
            }
            else if(itemAccate == "Deporte")
            {
              if(post.accate == 3)
              {
                resultPosts.push(post);
              }
            }
            else if(itemAccate == "Cultura")
            {
              if(post.accate == 4)
              {
                resultPosts.push(post);
              }
            }
          }
        }
        else if(searchByTitle == false && searchByDescription == true)
        {
          if(post.acdesc.indexOf(args) > -1)
          {
            if(itemAccate == "Mostrar todos")
            {
              if(post.accate == 1 || post.accate == 2 || post.accate == 3 || post.accate == 4)
              {
                resultPosts.push(post);
              }
            }
            else if(itemAccate == "Naturaleza")
            {
              if(post.accate == 1)
              {
                resultPosts.push(post);
              }
            }
            else if(itemAccate == "Gastronomía")
            {
              if(post.accate == 2)
              {
                resultPosts.push(post);
              }
            }
            else if(itemAccate == "Deporte")
            {
              if(post.accate == 3)
              {
                resultPosts.push(post);
              }
            }
            else if(itemAccate == "Cultura")
            {
              if(post.accate == 4)
              {
                resultPosts.push(post);
              }
            }
          }
        }
        else if(searchByTitle == false && searchByDescription == false)
        {

        }
        
    };
    if(resultPosts.length == 0)
    {

      alert("NO HAY RESULTADOS");
    }

    return resultPosts;
  }

}

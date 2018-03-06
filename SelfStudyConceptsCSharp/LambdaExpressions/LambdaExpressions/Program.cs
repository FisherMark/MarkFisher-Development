using System;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace LambdaExpressions
{
    class Program
    {
        static void Main(string[] args)
        {
            // args => expression

            //number => number * number;

            // () => ...
            // x => ...
            // (x, y, z) => ...

            //Func<int, int> square = number => number*number;
            //Console.WriteLine(square(5));

            //const int factor = 5;
            //Func<int, int> multiplier = n => n * factor;
            //can use variables defined in the class and the ones passed through the function.
            //var result = multiplier(10);
            //Console.WriteLine(result);


            var books = new BookRepository().GetBooks();

            //var cheapBooks = books.FindAll(IsCheaperThanTenDollars);
            var cheapBooks = books.FindAll(b => b.Price < 10);

            foreach (var book in cheapBooks)
            {
                Console.WriteLine(book.Title);
            }
        }

        //static bool IsCheaperThanTenDollars(Book book)
        //{
        //    return book.Price < 10;
        //}
    }
}

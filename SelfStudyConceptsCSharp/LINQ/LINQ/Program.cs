using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace LINQ
{
    class Program
    {
        static void Main(string[] args)
        {
            var books = new BookRepository().GetBooks();

            //LINQ Query Operators
            //slightly worse, keywords translate to extension methods
            //anyway, and there isnt a keyword for everything. although it is
            //friendlier and cleaner.

            var cheaperBooks =
                from b in books
                where b.Price < 10
                orderby b.Title
                select b;

            //LINQ Extension Methods
            var cheapBooks = books
                            .Where(b => b.Price < 10)
                            .OrderBy(b => b.Title)
                            .Select(b => b.Title);


            var bookMVC = books.FirstOrDefault(b => b.Title == "C# Advanced Topics");
            //var bookMVC = books.LastOrDefault(b => b.Title == "C# Advanced Topics");
            //var bookMVC = books.SingleOrDefault(b => b.Title == "ASP.NET MVC+");
            if (bookMVC != null)
                Console.WriteLine(bookMVC.Title + " " + bookMVC.Price);

            Console.WriteLine("---------------------");
            Console.WriteLine("Now trying skip and take");
            Console.WriteLine("---------------------");

            var pagedBooks = books.Skip(2).Take(3);
            foreach (var pagedBook in pagedBooks)
                Console.WriteLine(pagedBook.Title);


            var count = books.Count();
            Console.WriteLine("---------------------");
            Console.WriteLine(count);

            var max = books.Max(b => b.Price);
            Console.WriteLine("---------------------");
            Console.WriteLine(max);

            var min = books.Min(b => b.Price);
            Console.WriteLine("---------------------");
            Console.WriteLine(min);

            var totalCost = books.Sum(b => b.Price);
            Console.WriteLine("---------------------");
            Console.WriteLine(totalCost);

            var average = books.Average(b => b.Price);
            Console.WriteLine("---------------------");
            Console.WriteLine(average);

            //Workaround, non-LINQ version
            //
            //var cheapBooks = new List<Book>();
            //foreach (var book in books)
            //{
            //    if (book.Price < 10)
            //        cheapBooks.Add(book);
            //}



            //foreach (var book in cheapBooks)
            //{
            //    Console.WriteLine("---------------------");
            //    Console.WriteLine(book.Title + " " + book.Price);
            //    Console.WriteLine(book);

        }
    }
}

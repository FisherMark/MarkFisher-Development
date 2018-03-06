using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ExceptionHandling
{
    class Program
    {
        static void Main(string[] args)
        {
            try
            {
                var calculator = new Calculator();
                var result = calculator.Divide(5, 0);
            }
            catch (DivideByZeroException ex)
            {
                Console.WriteLine("You cannot divide by 0.");
            }
            catch (ArithmeticException ex)
            {

            }
            catch (Exception ex)
            {
                Console.WriteLine(ex.Message);
            }
        }
    }
}

using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace NullableTypes
{
    class Program
    {
        static void Main(string[] args)
        {
            DateTime? date = new DateTime(2014, 1, 1);
            //DateTime date2 = date; //can't convert nullable to normal even if !null
            DateTime date3 = date.GetValueOrDefault();
            DateTime? date4 = date3; //can convert normal to nullable fine
            Console.WriteLine(date4);

            Console.WriteLine("HasValue(): " + date.HasValue);
            Console.WriteLine("GetValueOrDefault(): " + date.GetValueOrDefault());
            //Console.WriteLine("Value(): " + date.Value); would cause error. above preferred



            DateTime? newDates = null;

            //DateTime newDates2;
            //if (newDates != null)
            //    newDates2 = newDates.GetValueOrDefault();
            //else
            //    newDates2 = DateTime.Today;
            //can be done easier with Null Coalescing Operator -> ??

            DateTime newDates2 = newDates ?? DateTime.Today;

            DateTime newDates3 = (newDates != null) ? newDates.GetValueOrDefault() : DateTime.Today;
            //it is similar to this, but for null cases its a special easy method.

            Console.WriteLine(newDates2);

            
        }
    }
}

using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace PersonalMvc.Models
{
    public class TypeProduct
    {
        public int Id { get; set; }
        public string Name { get; set; }
        public ICollection<Product> Products { get; set; }
        public TypeProduct()
        {
            Products = new List<Product>();
        }
    }
}
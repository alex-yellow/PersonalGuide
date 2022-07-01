using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace PersonalMvc.Models
{
    public class Product
    {
        public int Id { get; set; }
        public string Name { get; set; }
        public int? DepartmentId { get; set; }
        public Department Department { get; set; }
        public int? PersonalId { get; set; }
        public Personal Personal { get; set; }
        public int? MaterialId { get; set; }
        public Material Material { get; set; }
        public bool isBigSize { get; set; }
        public bool isMilitary { get; set; }
        public bool isSpecial { get; set; }
        public int Time { get; set; }
    }
}
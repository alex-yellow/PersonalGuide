using PersonalMvc.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using System.Data.Entity;

namespace PersonalMvc.Controllers
{
    public class ProductController : Controller
    {
        PersonalContext db = new PersonalContext();
        public ActionResult Index()
        {
            var products = db.Products.Include(p => p.Department).Include(m=>m.Material);
            return View(products.ToList());
        }
    }
}
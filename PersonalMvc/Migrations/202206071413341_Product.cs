namespace PersonalMvc.Migrations
{
    using System;
    using System.Data.Entity.Migrations;
    
    public partial class Product : DbMigration
    {
        public override void Up()
        {
            CreateTable(
                "dbo.Products",
                c => new
                    {
                        Id = c.Int(nullable: false, identity: true),
                        Name = c.String(),
                        DepartmentId = c.Int(),
                        Material = c.String(),
                        Time = c.Int(nullable: false),
                    })
                .PrimaryKey(t => t.Id)
                .ForeignKey("dbo.Departments", t => t.DepartmentId)
                .Index(t => t.DepartmentId);
            
        }
        
        public override void Down()
        {
            DropForeignKey("dbo.Products", "DepartmentId", "dbo.Departments");
            DropIndex("dbo.Products", new[] { "DepartmentId" });
            DropTable("dbo.Products");
        }
    }
}
